<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions (idempotent)
        $manageUsers   = Permission::firstOrCreate(['name' => 'manage users']);
        $manageContent = Permission::firstOrCreate(['name' => 'manage content']);

        // Create roles and assign permissions (idempotent)
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->syncPermissions([$manageContent]);

        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdminRole->syncPermissions(Permission::all());

        // Assign 'Super Admin' role to first user (or create default admin)
        $user = \App\Models\User::first();
        if (!$user) {
            $user = \App\Models\User::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]);
        }

        $user->syncRoles(['Super Admin']);

        $this->command->info("Super Admin role assigned to: {$user->email}");
    }
}
