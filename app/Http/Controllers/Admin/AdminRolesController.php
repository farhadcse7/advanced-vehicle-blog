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


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all()->groupBy('group_name');
        return view('admin.roles.edit', compact('role', 'permissions'));
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
            'name' => 'required|string|unique:roles,name,' . $id,
            'permissions' => 'nullable|array',
            // 'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissions')); //sync permissions

        return redirect()->route('admin.users.roles')->with('success', 'Role updated successfully!');
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('admin.users.roles')->with('success', 'Role deleted successfully!');
    }
}
