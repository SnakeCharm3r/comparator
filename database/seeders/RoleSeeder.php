<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define roles and assign existing permissions
        $roles = [
            'super-admin' => [],
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

        // Create roles and assign permissions
        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
        }
    }
}
