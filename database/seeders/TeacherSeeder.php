<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

final class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['user_id' => 1, 'category_id' => 1, 'national_id' => '12345678901', 'is_approved' => true, 'is_active' => true, 'title' => 'Senior Web Developer', 'avg_rating' => 4.8, 'reviews_count' => 150, 'students_count' => 2500, 'courses_count' => 5],
            ['user_id' => 2, 'category_id' => 1, 'national_id' => '12345678902', 'is_approved' => true, 'is_active' => true, 'title' => 'Front-end Architect', 'avg_rating' => 4.9, 'reviews_count' => 200, 'students_count' => 3200, 'courses_count' => 4],
            ['user_id' => 3, 'category_id' => 2, 'national_id' => '12345678903', 'is_approved' => true, 'is_active' => true, 'title' => 'Data Science Lead', 'avg_rating' => 4.7, 'reviews_count' => 180, 'students_count' => 2800, 'courses_count' => 3],
            ['user_id' => 4, 'category_id' => 3, 'national_id' => '12345678904', 'is_approved' => true, 'is_active' => true, 'title' => 'AI Research Scientist', 'avg_rating' => 4.9, 'reviews_count' => 220, 'students_count' => 3500, 'courses_count' => 4],
            ['user_id' => 5, 'category_id' => 4, 'national_id' => '12345678905', 'is_approved' => true, 'is_active' => true, 'title' => 'iOS Development Expert', 'avg_rating' => 4.8, 'reviews_count' => 160, 'students_count' => 2200, 'courses_count' => 3],
            ['user_id' => 6, 'category_id' => 5, 'national_id' => '12345678906', 'is_approved' => true, 'is_active' => true, 'title' => 'Cybersecurity Consultant', 'avg_rating' => 4.6, 'reviews_count' => 140, 'students_count' => 1800, 'courses_count' => 2],
            ['user_id' => 7, 'category_id' => 6, 'national_id' => '12345678907', 'is_approved' => true, 'is_active' => true, 'title' => 'Cloud Solutions Architect', 'avg_rating' => 4.8, 'reviews_count' => 190, 'students_count' => 3000, 'courses_count' => 4],
            ['user_id' => 8, 'category_id' => 7, 'national_id' => '12345678908', 'is_approved' => true, 'is_active' => true, 'title' => 'DevOps Engineer', 'avg_rating' => 4.7, 'reviews_count' => 170, 'students_count' => 2400, 'courses_count' => 3],
            ['user_id' => 9, 'category_id' => 8, 'national_id' => '12345678909', 'is_approved' => true, 'is_active' => true, 'title' => 'Computer Vision Specialist', 'avg_rating' => 4.8, 'reviews_count' => 210, 'students_count' => 2900, 'courses_count' => 3],
            ['user_id' => 10, 'category_id' => 9, 'national_id' => '12345678910', 'is_approved' => true, 'is_active' => true, 'title' => 'Blockchain Developer', 'avg_rating' => 4.7, 'reviews_count' => 185, 'students_count' => 2600, 'courses_count' => 3],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
