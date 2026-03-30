<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

final class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->offset(10)->limit(10)->get();
        $courses = Course::orderBy('id')->limit(10)->get();

        $reviews = [
            ['review' => 'Excellent course for Laravel beginners!', 'rating' => 5],
            ['review' => 'Advanced topics covered thoroughly.', 'rating' => 5],
            ['review' => 'Python DS course is outstanding.', 'rating' => 4],
            ['review' => 'TensorFlow ML is comprehensive.', 'rating' => 5],
            ['review' => 'iOS development simplified.', 'rating' => 4],
            ['review' => 'Ethical hacking basics are solid.', 'rating' => 5],
            ['review' => 'AWS cloud course is advanced.', 'rating' => 4],
            ['review' => 'Docker and K8s explained well.', 'rating' => 5],
            ['review' => 'Computer vision with OpenCV is great.', 'rating' => 4],
            ['review' => 'Blockchain development course rocks!', 'rating' => 5],
        ];

        foreach ($users as $index => $user) {
            $review = $reviews[$index];
            $review['user_id'] = $user->id;
            $review['course_id'] = $courses[$index]->id;
            Review::create($review);
        }
    }
}
