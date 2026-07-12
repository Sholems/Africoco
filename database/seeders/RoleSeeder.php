<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view dashboard',
            'manage blog',
            'manage pages',
            'manage programs',
            'manage events',
            'manage donations',
            'manage partners',
            'manage gallery',
            'manage team',
            'manage volunteers',
            'manage contact',
            'manage newsletter',
            'manage users',
            'manage roles',
            'manage projects',
            'export data',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Super Admin - all permissions
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->syncPermissions(Permission::all());

        // Content Manager
        $contentManager = Role::firstOrCreate(['name' => 'Content Manager']);
        $contentManager->syncPermissions([
            'view dashboard',
            'manage blog',
            'manage pages',
            'manage programs',
            'manage events',
            'manage gallery',
            'manage team',
            'manage projects',
            'export data',
        ]);

        // Finance/Admin Officer
        $financeOfficer = Role::firstOrCreate(['name' => 'Finance Officer']);
        $financeOfficer->syncPermissions([
            'view dashboard',
            'manage donations',
            'manage events',
            'manage volunteers',
            'export data',
        ]);

        // Media Officer
        $mediaOfficer = Role::firstOrCreate(['name' => 'Media Officer']);
        $mediaOfficer->syncPermissions([
            'view dashboard',
            'manage blog',
            'manage gallery',
            'export data',
        ]);

        // Assign Super Admin role to first user
        $user = \App\Models\User::first();
        if ($user) {
            $user->syncRoles(['Super Admin']);
        }
    }
}
