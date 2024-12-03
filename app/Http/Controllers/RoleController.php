<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    

    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        $roles = Role::all(); // Fetch all roles
        return view('role-permission.role.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);
      
        return redirect('role')->with('status', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('role')->with('status', 'Role Updated Successfully');
    }

    public function destroy($roleId)
    {
        try {
            $role = Role::findOrFail($roleId);
            $role->delete();
            return redirect('role')->with('status', 'Role Deleted Successfully');
        } catch (\Exception $e) {
            return redirect('role')->with('error', 'Failed to delete the role.');
        }
    }
    

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('role-permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
      
        return redirect()->back()->with('status', 'Permissions added to role');
    }

    public function showEditForm($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Fetch all roles
        $userRoles = $user->roles->pluck('name')->toArray(); // Get roles assigned to the user
        
        return view('role-permission.user.edit', compact('user', 'roles', 'userRoles'));
    }
    
}