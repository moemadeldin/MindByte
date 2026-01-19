<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Seeder;

final class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cartItems = [
            ['cart_id' => 1, 'course_id' => 1],
            ['cart_id' => 1, 'course_id' => 3],
            ['cart_id' => 2, 'course_id' => 2],
            ['cart_id' => 2, 'course_id' => 5],
            ['cart_id' => 3, 'course_id' => 4],
            ['cart_id' => 4, 'course_id' => 6],
            ['cart_id' => 5, 'course_id' => 7],
            ['cart_id' => 5, 'course_id' => 8],
        ];

        foreach ($cartItems as $item) {
            CartItem::create($item);
        }
    }
}
