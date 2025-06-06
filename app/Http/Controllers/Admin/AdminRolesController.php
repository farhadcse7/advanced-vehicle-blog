<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AdminRolesController extends Controller
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
        $roles = Role::with('permissions')->get(); // Fetch all roles with their permissions using Spatie package
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all()->groupBy('group_name'); // Fetch all permissions using Spatie package
        // dd($permissions);
        return view('admin.roles.create', compact('permissions'));
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement.show', compact('advertisement'));
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement.edit', compact('advertisement'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        try {

            $role = Role::create(['name' => $request->name]); //spatie implementation

            // Assign selected permissions
            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions); //spatie implementation
            }

            return redirect()->route('admin.users.roles')->with('success', 'Role created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.roles')->with('error', 'There was an error creating the role: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'slug' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:60',
            'meta_desc' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|array',
            'status' => 'required',
        ]);


        $advertisement = Advertisement::findOrFail($id);
        $advertisement->title = $request->title;

        $advertisement->category_id = $request->category_id;
        $advertisement->user_id = $request->user_id;
        $advertisement->description = $request->description;

        if ($request->hasFile('img')) {
            // Delete old image if exists
            $oldImagePath = public_path('assets/images/blog/' . $advertisement->img);
            if ($advertisement->img && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload new image
            $filename = uniqid() . '_' . $request->file('img')->getClientOriginalName();
            $destinationPath = public_path('assets/images/blog/');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            if ($request->file('img')->move($destinationPath, $filename)) {
                $advertisement->img = $filename;
            } else {
                return response()->json(['error' => 'File upload failed'], 500);
            }
        }

        // If is_banner is checked set other posts is_banner to 0
        if ($request->has('is_banner')) {
            Advertisement::where('is_banner', 1)->update(['is_banner' => 0]);
        }

        $advertisement->meta_title = $request->meta_title;
        $advertisement->meta_desc = $request->meta_desc;
        $advertisement->meta_keywords = implode(',', $request->input('meta_keywords', []));

        $advertisement->status = $request->status;
        $advertisement->is_banner = $request->has('is_banner') ? 1 : 0;
        $advertisement->save();

        return redirect()->route('admin.advertisement.index')->with('success', 'Blog post updated successfully!');
    }

    public function delete($id)
    {
        try {
            $advertisement = Advertisement::findOrFail($id);

            if ($advertisement->img) {
                $imagePath = public_path('assets/images/banner/' . $advertisement->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $advertisement->delete();

            return redirect()->route('admin.advertisements.index')->with('success', 'Advertisement banner deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting Advertisement banner: ' . $e->getMessage());
            return redirect()->route('admin.advertisements.index')->with('error', 'There was an error deleting the Advertisement banner.');
        }
    }
}
