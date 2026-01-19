<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
final class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->numberBetween(1, 100),
            'course_id' => fake()->numberBetween(1, 50),
            'enrolled_at' => fake()->dateTimeBetween('-1 year'),
            'progress' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
