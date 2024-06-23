<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // List of permissions to create based on roles defined in RoleSeeder
        $permissions = [
            'Submit Request Forms',
            'Access User Dashboard',
            'View All Request Forms',
            'View Submitted Request Forms',
            'Check Request Status',
            'Approve HR Requests',
            'Approve IT Requests',
            'Approve Head of Department Requests',
            'Manage Employee Information',
            'Assign Roles to Users',
            'Assign Permissions to Roles',
            'View Existing Roles',
            'Create New Roles',
            'Edit Existing Roles',
            'Delete Roles',
        ];

        // Create permissions if they do not already exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}


