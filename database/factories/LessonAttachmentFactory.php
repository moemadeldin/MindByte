<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LessonAttachment>
 */
final class LessonAttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lesson_id' => Lesson::inRandomOrder()->first()?->id ?? Lesson::factory(),
            'name' => fake()->word(),
            'type' => fake()->randomElement(['pdf', 'image', 'audio', 'video', 'document']),
            'url' => fake()->url(),
            'size' => fake()->numberBetween(1000, 10000000),
        ];
    }
}
