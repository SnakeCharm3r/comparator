<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Reset cached roles and permissions
       app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       // List of permissions to create
       $permissions = [
           'submit form',
           'view forms',
           'user dashboard',
           'view own forms',
           'check form status',
           'approve hr',
           'approve it',
           'approve hod',
           'approve acting hod',
           'role assign',
           'permission assign',
           'create role',
           'view role',
           'edit role',
           'delete role',
       ];

       // Create permissions if they do not already exist
       foreach ($permissions as $permission) {
           Permission::firstOrCreate(['name' => $permission]);
       }
    }
}
