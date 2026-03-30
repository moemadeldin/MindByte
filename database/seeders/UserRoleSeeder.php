<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::orderBy('id')->limit(20)->get();
        $teacherRole = Role::where('name', 'teacher')->first();
        $userRole = Role::where('name', 'user')->first();

        foreach ($users as $index => $user) {
            $roleId = $index < 10 ? $teacherRole->id : $userRole->id;
            DB::table('user_roles')->insert([
                'user_id' => $user->id,
                'role_id' => $roleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
