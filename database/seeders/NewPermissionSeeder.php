<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class NewPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::updateOrCreate(
            ['name' => 'expenses report'],
            ['name' => 'expenses report']
        );

        Permission::updateOrCreate(
            ['name' => 'temple users report'],
            ['name' => 'temple users report']
        );

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::where('name', 'super-admin')->first();
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
