<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'view requests',
            'view my requests',
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
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
