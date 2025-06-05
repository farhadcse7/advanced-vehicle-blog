<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
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
        return view('admin.users.create');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
            // Hashing the password
            $user->password = Hash::make($request->password);
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
            'password' => 'nullable|string|min:3',
            'role_id' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        // Only update the password if it's provided
        if ($request->filled('password')) {
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

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        try {
            $post = Post::findOrFail($id);

            if ($post->img) {
                $imagePath = public_path('assets/images/blog/' . $post->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $post->delete();

            return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting blog post: ' . $e->getMessage());
            return redirect()->route('admin.blogs.index')->with('error', 'There was an error deleting the blog post.');
        }
    }
}
