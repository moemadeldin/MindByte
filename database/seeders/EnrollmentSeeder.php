<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Seeder;

final class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->offset(10)->limit(10)->get();
        $courses = Course::orderBy('id')->limit(10)->get();

        $enrollments = [
            ['enrolled_at' => '2023-01-15', 'progress' => 75.5],
            ['enrolled_at' => '2023-02-10', 'progress' => 60.0],
            ['enrolled_at' => '2023-03-05', 'progress' => 90.0],
            ['enrolled_at' => '2023-04-12', 'progress' => 45.0],
            ['enrolled_at' => '2023-05-20', 'progress' => 80.0],
            ['enrolled_at' => '2023-06-08', 'progress' => 30.0],
            ['enrolled_at' => '2023-07-14', 'progress' => 100.0],
            ['enrolled_at' => '2023-08-22', 'progress' => 55.0],
            ['enrolled_at' => '2023-09-01', 'progress' => 85.0],
            ['enrolled_at' => '2023-10-10', 'progress' => 70.0],
        ];

        foreach ($users as $index => $user) {
            $enrollment = $enrollments[$index];
            $enrollment['student_id'] = $user->id;
            $enrollment['course_id'] = $courses[$index]->id;
            Enrollment::create($enrollment);
        }
    }
}
