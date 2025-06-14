<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminAuthenticationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // roles are fetched using spatie package
        return view('admin.users.create', compact('roles'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:3',
            'role_id' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            // $user->password = bcrypt($request->password);
            if ($request->password == 'password') {
                // Hashing the password
                $user->password = Hash::make($request->password);
            }

            $user->role_id = $request->role_id;
            $user->status = $request->status;

            if ($request->hasFile('img')) {
                $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();

                $destinationPath = public_path('assets/images/avatar/');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                if ($request->file('img')->move($destinationPath, $filename)) {
                    $user->img = $filename;
                } else {
                    return response()->json(['error' => 'File upload failed'], 500);
                }
            }

            $user->save();

            //assign role to Table: model_has_permissions
            $role = Role::findById($request->role_id);
            $roleName = $role->name;
            $user->assignRole($roleName);


            return redirect()->route('admin.user.create')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            // dd($e);
            \Log::error('Error creating user:' . $e->getMessage());
            return redirect()->route('admin.user.create')->with('error', 'There was an error creating the user.');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Ensure unique email except for the current user
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $id, //also works
            'password' => 'nullable|string|min:3',
            'role_id' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password == 'password') {
            // Hashing the password
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->status = $request->status;

        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($user->img) {
                $oldImagePath = public_path('assets/images/avatar/' . $user->img);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();
            $destinationPath = public_path('assets/images/avatar/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            if ($request->file('img')->move($destinationPath, $filename)) {
                $user->img = $filename;
            } else {
                return response()->json(['error' => 'File upload failed'], 500);
            }
        }

        $user->save();

        //asign role to Table: model_has_roles
        $role = Role::findById($request->role_id);
        $roleName = $role->name;
        $user->syncRoles($roleName);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);

            // Check if the user has associated posts -slow performance
            if ($user->posts()->count() > 0) {
                return redirect()->route('admin.users.index')->with('error', 'User cannot be deleted because they have associated posts.');
            }

            // Check if the user has associated posts -faster performance
            // if ($user->posts()->exists()) {
            //     return redirect()->route('admin.users.index')->with('error', 'User cannot be deleted because they have associated posts.');
            // }

            if ($user->img) {
                $imagePath = public_path('assets/images/avatar/' . $user->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $user->delete();

            return redirect()->route('admin.users.index')->with('success', 'User is deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting User: ' . $e->getMessage());
            return redirect()->route('admin.users.index')->with('error', 'There was an error deleting the User.');
        }
    }
}
