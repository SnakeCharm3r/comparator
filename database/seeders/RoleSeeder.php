<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'level1_approver']);
        Role::create(['name' => 'level2_approver']);
        Role::create(['name' => 'administrator']);

      

    }
}
