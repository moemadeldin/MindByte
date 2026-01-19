<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
final class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section_id' => Section::inRandomOrder()->first()?->id ?? Section::factory(),
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(2, true),
            'order' => fake()->numberBetween(1, 5),
        ];
    }
}
