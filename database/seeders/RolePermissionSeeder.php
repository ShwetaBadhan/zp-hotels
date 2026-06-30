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
        'manage-booking-leads',
        'manage-contact-leads',
        'manage-events',
        'manage-facilities',
        'manage-gallery-category',
        'manage-gallery',
        'manage-room-category',
        'manage-room',
        'manage-room-facilities',
        'manage-nearby-attraction',
        'manage-team-member',
        'manage-testimonials',
        'manage-home-about',
        'manage-home-slider',
        'manage-about-about',
        'manage-about-mission',
        'manage-event-about',
        'manage-faq',
        'manage-user',
        'manage-roles',
        'manage-permission',
        'manage-settings',
        'delete',
        'edit',
        'manage-privacy-policy',
        'manage-terms-conditions',
        
    ];
    foreach ($permissions as $perm) {
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $perm]);
    }

    // Roles
    $admin = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']);
    $manager = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'manager']);
    $staff = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'staff']);

    $admin->givePermissionTo($permissions); // Admin gets everything
}
}
