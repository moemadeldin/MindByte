<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

final class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            ['user_id' => 11, 'course_id' => 1, 'review' => 'Excellent course for Laravel beginners!', 'rating' => 5],
            ['user_id' => 12, 'course_id' => 2, 'review' => 'Advanced topics covered thoroughly.', 'rating' => 5],
            ['user_id' => 13, 'course_id' => 3, 'review' => 'Python DS course is outstanding.', 'rating' => 4],
            ['user_id' => 14, 'course_id' => 4, 'review' => 'TensorFlow ML is comprehensive.', 'rating' => 5],
            ['user_id' => 15, 'course_id' => 5, 'review' => 'iOS development simplified.', 'rating' => 4],
            ['user_id' => 16, 'course_id' => 6, 'review' => 'Ethical hacking basics are solid.', 'rating' => 5],
            ['user_id' => 17, 'course_id' => 7, 'review' => 'AWS cloud course is advanced.', 'rating' => 4],
            ['user_id' => 18, 'course_id' => 8, 'review' => 'Docker and K8s explained well.', 'rating' => 5],
            ['user_id' => 19, 'course_id' => 9, 'review' => 'Computer vision with OpenCV is great.', 'rating' => 4],
            ['user_id' => 20, 'course_id' => 10, 'review' => 'Blockchain development course rocks!', 'rating' => 5],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
