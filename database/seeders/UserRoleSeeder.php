<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign teacher role to users 1-10
        for ($i = 1; $i <= 10; $i++) {
            DB::table('user_roles')->insert([
                'user_id' => $i,
                'role_id' => 2, // Teacher role (assuming role_id 2 is teacher from RoleSeeder)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Assign user role to users 11-20
        for ($i = 11; $i <= 20; $i++) {
            DB::table('user_roles')->insert([
                'user_id' => $i,
                'role_id' => 1, // User role (assuming role_id 1 is user from RoleSeeder)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
