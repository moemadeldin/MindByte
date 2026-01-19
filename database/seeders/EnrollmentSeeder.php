<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Seeder;

final class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollments = [
            ['student_id' => 11, 'course_id' => 1, 'enrolled_at' => '2023-01-15', 'progress' => 75.5],
            ['student_id' => 12, 'course_id' => 2, 'enrolled_at' => '2023-02-10', 'progress' => 60.0],
            ['student_id' => 13, 'course_id' => 3, 'enrolled_at' => '2023-03-05', 'progress' => 90.0],
            ['student_id' => 14, 'course_id' => 4, 'enrolled_at' => '2023-04-12', 'progress' => 45.0],
            ['student_id' => 15, 'course_id' => 5, 'enrolled_at' => '2023-05-20', 'progress' => 80.0],
            ['student_id' => 16, 'course_id' => 6, 'enrolled_at' => '2023-06-08', 'progress' => 30.0],
            ['student_id' => 17, 'course_id' => 7, 'enrolled_at' => '2023-07-14', 'progress' => 100.0],
            ['student_id' => 18, 'course_id' => 8, 'enrolled_at' => '2023-08-22', 'progress' => 55.0],
            ['student_id' => 19, 'course_id' => 9, 'enrolled_at' => '2023-09-01', 'progress' => 85.0],
            ['student_id' => 20, 'course_id' => 10, 'enrolled_at' => '2023-10-10', 'progress' => 70.0],
        ];

        foreach ($enrollments as $enrollment) {
            Enrollment::create($enrollment);
        }
    }
}
