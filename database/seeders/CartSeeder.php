<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

final class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = [
            ['user_id' => 11],
            ['user_id' => 12],
            ['user_id' => 13],
            ['user_id' => 14],
            ['user_id' => 15],
        ];

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}
