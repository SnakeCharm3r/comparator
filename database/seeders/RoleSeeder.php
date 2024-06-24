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
    //$roles = [
      // 'Requester' => ['Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      // 'HR Officer' => ['Approve Head of Department Requests', 'Approve HR Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      // 'HR Manager' => ['Approve HR Requests', 'Approve Head of Department Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status', 'Manage Employee Information'],
      // 'Admin' => ['Approve IT Requests', 'Approve HR Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      // 'Line Manager' => ['Approve Head of Department Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      // 'Acting Line Manager' => ['Approve Head of Department Requests', 'Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status'],
      // 'Super Admin' => ['Submit Request Forms', 'Access User Dashboard', 'View All Request Forms', 'View Submitted Request Forms', 'Check Request Status', 'Approve HR Requests', 'Approve IT Requests', 'Approve Head of Department Requests', 'Assign Roles to Users', 'Assign Permissions to Roles', 'View Existing Roles', 'Create New Roles', 'Edit Existing Roles', 'Delete Roles'],
  //];

   // Define roles and assign existing permissions
   $roles = [
    'super-admin' ,
    'admin' => [
        'view dashboard',
        'view forms',
        'view ict access form',
        'view hr clearance form',
        'view data security agreement',
        'view change management',
        'view requests',
        'approve requests',
        'view departments',
        'view nhif',
        'view hmis',
        'view remarks',
        'view user category',
        'view employment type',
        'manage users',
        'assign roles',
        'manage roles',
        'manage permissions',
        'view settings',
        'view logs'
    ],
    'hr' => [
        'view dashboard',
        'approve requests'
    ],
    'it' => [
        'view dashboard',
        'view forms',
        'view ict access form',
        'approve requests',
        'view departments',
        'view user category',
        'view requests'
    ],
    'line-manager' => [
        'view dashboard',
        'view forms',
        'approve requests',
        'view departments',
        'view user category'
    ],
    'acting-line-manager' => [
        'view dashboard',
        'view forms',
        'approve requests',
        'view departments',
        'view user category'
    ],
    'requester' => [
        'view dashboard',
        'view forms',
        'view my requests'
    ]
];


    // Create roles and assign permissions if they do not already exist
    foreach ($roles as $roleName => $permissions) {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $role->syncPermissions($permissions);
      }
    }
}
