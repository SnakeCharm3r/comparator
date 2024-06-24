<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // List of roles and their permissions
    $roles = [
      'Requester' => ['Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      'HR Officer' => ['Approve Head of Department Requests', 'Approve HR Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      'HR Manager' => ['Approve HR Requests', 'Approve Head of Department Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status', 'Manage Employee Information'],
      'Admin' => ['Approve IT Requests', 'Approve HR Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      'Line Manager' => ['Approve Head of Department Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      'Acting Line Manager' => ['Approve Head of Department Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      'Super Admin' => ['Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status', 'Approve HR Requests', 'Approve IT Requests', 'Approve Head of Department Requests', 'Assign Roles to Users', 'Assign Permissions to Roles', 'View Existing Roles', 'Create New Roles', 'Edit Existing Roles', 'Delete Roles'],
  ];


  //   $roles = [
  //     'Requester' => [
  //         'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //     ],
  //     'Human Resources Officer' => [
  //         'Approve Head of Department  Requests',
  //         'Approve HR  Requests',
  //         'Submit  Request Forms',
  //         'Access User Dashboard',
  //         'View All  Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //         'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //     ],
  //   'Human Resource Manager' => [ 
  //       'Approve HR Requests',  
  //       'Approve Head of Department Requests', 
  //       'Submit Request Forms',
  //       'Access User Dashboard',
  //       'View All Request Forms', 
  //       'View Submitted Request Forms', 
  //       'Check Request Status',
  //       'Manage Employee Information', 
  //       'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //   ],
  //     'IT Personnel' => [
  //         'Approve IT  Requests',
  //         'Approve HR  Requests',
  //         'Submit  Request Forms',
  //         'Access User Dashboard',
  //         'View All  Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //         'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //     ],
  //     'Line Manager' => [
  //         'Approve Head of Department  Requests',
  //         'Submit  Request Forms',
  //         'Access User Dashboard',
  //         'View All  Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //         'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //     ],
  //     'Acting Line Manager' => [  // Added role
  //         'Approve Head of Department  Requests', // Likely same as Line Manager
  //         'Submit  Request Forms',
  //         'Access User Dashboard',
  //         'View All  Request Forms',
  //         'View Submitted  Request Forms',  // Consider restricting to own team's requests
  //         'Check  Request Status',
  //         'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //     ],
  //     'Super Admin' => [
  //         'Submit  Request Forms',
  //         'Access User Dashboard',
  //         'View All  Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //         'Approve HR  Requests',
  //         'Approve IT  Requests',
  //         'Approve Head of Department  Requests',
  //         'Assign Roles to Users',
  //         'Assign Permissions to Roles',
  //         'View Existing Roles',
  //         'Create New Roles',
  //         'Edit Existing Roles',
  //         'Delete Roles',
  //         'Submit Request Forms',
  //         'Access User Dashboard',
  //         'View All Request Forms',
  //         'View Submitted  Request Forms',
  //         'Check  Request Status',
  //     ],
  // ];
  
    // Create roles and assign permissions if they do not already exist
    foreach ($roles as $roleName => $permissions) {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $role->syncPermissions($permissions);
      }
    }
}
