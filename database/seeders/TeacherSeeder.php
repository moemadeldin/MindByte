<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

final class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->limit(10)->get();
        $categories = Category::orderBy('id')->get();

        $teachers = [
            ['national_id' => '12345678901', 'is_approved' => true, 'is_active' => true, 'title' => 'Senior Web Developer', 'avg_rating' => 4.8, 'reviews_count' => 150, 'students_count' => 2500, 'courses_count' => 5],
            ['national_id' => '12345678902', 'is_approved' => true, 'is_active' => true, 'title' => 'Front-end Architect', 'avg_rating' => 4.9, 'reviews_count' => 200, 'students_count' => 3200, 'courses_count' => 4],
            ['national_id' => '12345678903', 'is_approved' => true, 'is_active' => true, 'title' => 'Data Science Lead', 'avg_rating' => 4.7, 'reviews_count' => 180, 'students_count' => 2800, 'courses_count' => 3],
            ['national_id' => '12345678904', 'is_approved' => true, 'is_active' => true, 'title' => 'AI Research Scientist', 'avg_rating' => 4.9, 'reviews_count' => 220, 'students_count' => 3500, 'courses_count' => 4],
            ['national_id' => '12345678905', 'is_approved' => true, 'is_active' => true, 'title' => 'iOS Development Expert', 'avg_rating' => 4.8, 'reviews_count' => 160, 'students_count' => 2200, 'courses_count' => 3],
            ['national_id' => '12345678906', 'is_approved' => true, 'is_active' => true, 'title' => 'Cybersecurity Consultant', 'avg_rating' => 4.6, 'reviews_count' => 140, 'students_count' => 1800, 'courses_count' => 2],
            ['national_id' => '12345678907', 'is_approved' => true, 'is_active' => true, 'title' => 'Cloud Solutions Architect', 'avg_rating' => 4.8, 'reviews_count' => 190, 'students_count' => 3000, 'courses_count' => 4],
            ['national_id' => '12345678908', 'is_approved' => true, 'is_active' => true, 'title' => 'DevOps Engineer', 'avg_rating' => 4.7, 'reviews_count' => 170, 'students_count' => 2400, 'courses_count' => 3],
            ['national_id' => '12345678909', 'is_approved' => true, 'is_active' => true, 'title' => 'Computer Vision Specialist', 'avg_rating' => 4.8, 'reviews_count' => 210, 'students_count' => 2900, 'courses_count' => 3],
            ['national_id' => '12345678910', 'is_approved' => true, 'is_active' => true, 'title' => 'Blockchain Developer', 'avg_rating' => 4.7, 'reviews_count' => 185, 'students_count' => 2600, 'courses_count' => 3],
        ];

        foreach ($users as $index => $user) {
            $teacher = $teachers[$index];
            $teacher['user_id'] = $user->id;
            $teacher['category_id'] = $categories->get($index)->id ?? $categories->first()->id;
            Teacher::create($teacher);
        }
    }
}
