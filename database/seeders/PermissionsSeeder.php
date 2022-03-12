<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list castes']);
        Permission::create(['name' => 'view castes']);
        Permission::create(['name' => 'create castes']);
        Permission::create(['name' => 'update castes']);
        Permission::create(['name' => 'delete castes']);

        Permission::create(['name' => 'list donations']);
        Permission::create(['name' => 'view donations']);
        Permission::create(['name' => 'create donations']);
        Permission::create(['name' => 'update donations']);
        Permission::create(['name' => 'delete donations']);

        Permission::create(['name' => 'list expenses']);
        Permission::create(['name' => 'view expenses']);
        Permission::create(['name' => 'create expenses']);
        Permission::create(['name' => 'update expenses']);
        Permission::create(['name' => 'delete expenses']);

        Permission::create(['name' => 'list expensetypes']);
        Permission::create(['name' => 'view expensetypes']);
        Permission::create(['name' => 'create expensetypes']);
        Permission::create(['name' => 'update expensetypes']);
        Permission::create(['name' => 'delete expensetypes']);

        Permission::create(['name' => 'list kootams']);
        Permission::create(['name' => 'view kootams']);
        Permission::create(['name' => 'create kootams']);
        Permission::create(['name' => 'update kootams']);
        Permission::create(['name' => 'delete kootams']);

        Permission::create(['name' => 'list taxlists']);
        Permission::create(['name' => 'view taxlists']);
        Permission::create(['name' => 'create taxlists']);
        Permission::create(['name' => 'update taxlists']);
        Permission::create(['name' => 'delete taxlists']);

        Permission::create(['name' => 'list alltaxpayers']);
        Permission::create(['name' => 'view alltaxpayers']);
        Permission::create(['name' => 'create alltaxpayers']);
        Permission::create(['name' => 'update alltaxpayers']);
        Permission::create(['name' => 'delete alltaxpayers']);

        Permission::create(['name' => 'list alltaxpaymentdetails']);
        Permission::create(['name' => 'view alltaxpaymentdetails']);
        Permission::create(['name' => 'create alltaxpaymentdetails']);
        Permission::create(['name' => 'update alltaxpaymentdetails']);
        Permission::create(['name' => 'delete alltaxpaymentdetails']);

        Permission::create(['name' => 'list templeusers']);
        Permission::create(['name' => 'view templeusers']);
        Permission::create(['name' => 'create templeusers']);
        Permission::create(['name' => 'update templeusers']);
        Permission::create(['name' => 'delete templeusers']);

        Permission::create(['name' => 'list vageras']);
        Permission::create(['name' => 'view vageras']);
        Permission::create(['name' => 'create vageras']);
        Permission::create(['name' => 'update vageras']);
        Permission::create(['name' => 'delete vageras']);

        Permission::create(['name' => 'list villages']);
        Permission::create(['name' => 'view villages']);
        Permission::create(['name' => 'create villages']);
        Permission::create(['name' => 'update villages']);
        Permission::create(['name' => 'delete villages']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'donations report']);
        Permission::create(['name' => 'paytax report']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
