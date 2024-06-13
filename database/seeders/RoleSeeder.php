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
        'requester' => ['submit form', 'user dashboard', 'view forms', 'view own forms', 'check form status'],
        // 'hr officer' => [],
        'head of hr' => ['approve hod','approve hr','submit form', 'user dashboard', 'view forms', 'view own forms', 'check form status'],
        'head of it' => ['approve it','approve hr','submit form', 'user dashboard', 'view forms', 'view own forms', 'check form status'],
        'head of department' => ['approve hod','submit form', 'user dashboard', 'view forms', 'view own forms', 'check form status'],
        'acting hod' => ['approve hr', 'approve it', 'approve hod'],
        'super admin' => ['submit form', 'user dashboard', 'view forms', 'view own forms', 'check form status',
                          'approve hr','approve it','approve hod','role assign','permission assign']
    ];

    // Create roles and assign permissions if they do not already exist
    foreach ($roles as $roleName => $permissions) {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $role->syncPermissions($permissions);
      }
    }
}
