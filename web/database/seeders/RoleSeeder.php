<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        // Create roles
        $role = Role::create(['name' => 'user']);

        // trainer
        $role = Role::create(['name' => 'trainer']);

        // role that is assigned to campus entities like  college canteen, library, store, etc.
        $role = Role::create(['name' => 'admin']);
    }
}
