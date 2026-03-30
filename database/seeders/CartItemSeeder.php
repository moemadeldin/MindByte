<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Course;
use Illuminate\Database\Seeder;

final class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $carts = Cart::orderBy('id')->get();
        $courses = Course::orderBy('id')->get();

        $cartItems = [
            [0, 0],
            [0, 2],
            [1, 1],
            [1, 4],
            [2, 3],
            [3, 5],
            [4, 6],
            [4, 7],
        ];

        foreach ($cartItems as $item) {
            CartItem::create([
                'cart_id' => $carts[$item[0]]->id,
                'course_id' => $courses[$item[1]]->id,
            ]);
        }
    }
}
