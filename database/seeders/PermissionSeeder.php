<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        $permissions = [
            'view dashboard',
            'view forms',
            'view ict access form',
            'view hr clearance form',
            'view data security agreement',
            'view change management',
            'view requests', // Ensure this permission is included
            'approve requests',
            'view my requests',
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
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Define roles and assign existing permissions
        $roles = [
            'super-admin' => $permissions,
            'admin' => [
                'view dashboard',
                'view forms',
                'view ict access form',
                'view hr clearance form',
                'view data security agreement',
                'view change management',
                'view requests', // Ensure this permission is included
                'approve requests',
                'view my requests',
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
                'view forms',
                'view hr clearance form',
                'approve requests',
                'view departments',
                'view user category'
            ],
            'it' => [
                'view dashboard',
                'view forms',
                'view ict access form',
                'approve requests',
                'view departments',
                'view user category',
                'view requests' // Ensure this permission is included
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
                'view my requests',
                // 'view requests' // Ensure this permission is included if needed
            ]
        ];

        // Create roles and assign permissions
        foreach ($roles as $role => $permissions) {
            $role = Role::firstOrCreate(['name' => $role]);
            $role->syncPermissions($permissions);
        }
    }
}
