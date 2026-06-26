<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        $user = User::firstOrCreate(
            ['email' => 'vibrantick@gmail.com'],
            [
                'name' => 'Vibrantick',
                'password' => bcrypt('Admin@123'),
            ]
        );

        $user->assignRole('admin');
    }
}
