<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\CourseLevel;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
final class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'thumbnail' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'long_description' => fake()->paragraphs(3, true),
            'price' => fake()->randomFloat(2, 10, 100),
            'is_free' => fake()->boolean(20), // 20% free
            'level' => fake()->randomElement(CourseLevel::cases())->value,
            'language' => fake()->randomElement(['en', 'es', 'fr', 'de']),
            'requirements' => json_encode(['req1', 'req2']),
        ];
    }
}
