<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;

final class CartSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->offset(10)->limit(5)->get();

        foreach ($users as $user) {
            Cart::create(['user_id' => $user->id]);
        }
    }
}
