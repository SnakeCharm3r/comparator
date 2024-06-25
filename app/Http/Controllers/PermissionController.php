<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    // Middleware setup (commented out for now)
    // public function __construct()
    // {
    //     $this->middleware('role:super-admin', ['only' => ['index', 'create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit', 'destroy']]);
    //     $this->middleware('role:admin', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit']]);
    //     $this->middleware('role:hr', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit']]);
    //     $this->middleware('role:it', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit']]);
    //     $this->middleware('role:line-manager', ['only' => ['update', 'edit']]);
    // }

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('role-permission.permission.index', compact('roles', 'permissions'));
    }

    public function showRolesWithPermission()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('role-permission.permission.index', compact('roles', 'permissions'));
    }

    public function updateRolesWithPermissions(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('status', 'Permissions updated successfully');
    }

    public function getPermissionsByRole($roleId)
    {
        $role = Role::find($roleId);
        if ($role) {
            $permissions = Permission::all()->map(function($permission) use ($role) {
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'active' => $role->hasPermissionTo($permission->name),
                ];
            });
            return response()->json($permissions);
        }
        return response()->json([], 404);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('permission')->with('status', 'Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        return view('role-permission.permission.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('permission')->with('status', 'Permission Updated Successfully');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permission')->with('status', 'Permission Deleted Successfully');
    }
}
