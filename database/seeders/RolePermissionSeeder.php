<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    // Reset cached roles & permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    // Permissions
    $permissions = [
        'view-dashboard',
        'view-rooms', 'manage-rooms',
        'view-bookings', 'manage-bookings',
        'view-invoices', 'manage-invoices',
        'view-settings', 'manage-settings',
        'view-users', 'manage-roles', 'assign-permissions'
    ];
    foreach ($permissions as $perm) {
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $perm]);
    }

    // Roles
    $admin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
    $manager = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'manager']);
    $staff = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'staff']);

    $admin->givePermissionTo($permissions); // Admin gets everything
    $manager->givePermissionTo(['view-rooms','manage-rooms','view-bookings','manage-bookings','view-settings']);
    $staff->givePermissionTo(['view-dashboard','view-rooms','view-bookings']);
}
}
