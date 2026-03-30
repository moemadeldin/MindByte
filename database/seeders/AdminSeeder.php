<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

final class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'admin123',
            'is_active' => true,
        ]);
        $adminRole = Role::whereName(Roles::ADMIN->value)->first();
        $user->roles()->attach($adminRole->id);
    }
}
