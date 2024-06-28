<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    // Middleware setup (commented out for now)
    public function __construct()
    {
        $this->middleware('role:super-admin', ['only' => ['index', 'create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit', 'destroy']]);
        $this->middleware('role:admin', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit']]);
        $this->middleware('role:hr', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit']]);
        $this->middleware('role:it', ['only' => ['create', 'store', 'addPermissionToRole', 'givePermissionToRole', 'update', 'edit']]);
        $this->middleware('role:line-manager', ['only' => ['update', 'edit']]);
    }

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('role-permission.permission.index', compact('roles', 'permissions'));
    }

   public function getRolePermissions($roleId){
    $role = Role::with('permissions')->find($roleId);
    $permissions = Permission::all();

    $rolePermissions = $role->permissions->pluck('name')->toArray();
    $permissionsData = $permissions->map(function ($permission) use ($rolePermissions) {

        return  [
            'id' => $permission->id,
            'name' => $permission->name,
            'active' => in_array($permission->name, $rolePermissions)
        ];
    });

    return response()->json($permissionsData);
   }

   public function updateRolePermissions(Request $request)
   {
       $role = Role::find($request->role_id);  
   
       if ($role) {
           $role->syncPermissions($request->permissions);
   
           return redirect()->back()->with('status', 'Permissions updated successfully');
       }
   
       return redirect()->back()->with('error', 'Role not found');
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

    // public function update(Request $request, Permission $permission)
    // {
    //     $request->validate([
    //         'name' => [
    //             'required',
    //             'string',
    //             'unique:permissions,name,'.$permission->id
    //         ]
    //     ]);

    //      $permission->update([
    //         'name' => $request->name
    //     ]);

    //     return redirect('permission')->with('status', 'Permission Updated Successfully');
    // }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
    
        if ($permission) {
            $permission->delete();
            return response()->json(['status' => 'success', 'message' => 'Permission deleted successfully']);
        }
    
        return response()->json(['status' => 'error', 'message' => 'Permission not found'], 404);
    }
    
}