<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Course;
use Illuminate\Database\Seeder;

final class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::orderBy('id')->get();

        $sections = [
            ['title' => 'Getting Started', 'order' => 1],
            ['title' => 'Routing and Controllers', 'order' => 2],
            ['title' => 'Models and Database', 'order' => 3],
            ['title' => 'Advanced Functions', 'order' => 1],
            ['title' => 'Async Programming', 'order' => 2],
            ['title' => 'Modern JavaScript', 'order' => 3],
            ['title' => 'Python Basics', 'order' => 1],
            ['title' => 'Pandas and NumPy', 'order' => 2],
            ['title' => 'Data Visualization', 'order' => 3],
            ['title' => 'Neural Networks', 'order' => 1],
            ['title' => 'Training Models', 'order' => 2],
            ['title' => 'Deployment', 'order' => 3],
            ['title' => 'Swift Basics', 'order' => 1],
            ['title' => 'UIKit Fundamentals', 'order' => 2],
            ['title' => 'Advanced iOS Features', 'order' => 3],
            ['title' => 'Networking Basics', 'order' => 1],
            ['title' => 'Scanning and Enumeration', 'order' => 2],
            ['title' => 'Exploitation Techniques', 'order' => 3],
            ['title' => 'AWS Fundamentals', 'order' => 1],
            ['title' => 'EC2 and Storage', 'order' => 2],
            ['title' => 'Advanced Services', 'order' => 3],
            ['title' => 'Docker Basics', 'order' => 1],
            ['title' => 'Kubernetes Fundamentals', 'order' => 2],
            ['title' => 'Orchestration', 'order' => 3],
            ['title' => 'Image Processing', 'order' => 1],
            ['title' => 'Object Detection', 'order' => 2],
            ['title' => 'Advanced Vision', 'order' => 3],
            ['title' => 'Blockchain Basics', 'order' => 1],
            ['title' => 'Smart Contracts', 'order' => 2],
            ['title' => 'DApps', 'order' => 3],
            ['title' => 'Unity Interface', 'order' => 1],
            ['title' => 'C# Scripting', 'order' => 2],
            ['title' => 'Game Mechanics', 'order' => 3],
            ['title' => 'React Native Basics', 'order' => 1],
            ['title' => 'Components and Navigation', 'order' => 2],
            ['title' => 'Native Features', 'order' => 3],
            ['title' => 'D3.js Fundamentals', 'order' => 1],
            ['title' => 'Scales and Axes', 'order' => 2],
            ['title' => 'Interactive Charts', 'order' => 3],
            ['title' => 'Text Processing', 'order' => 1],
            ['title' => 'Sentiment Analysis', 'order' => 2],
            ['title' => 'Language Models', 'order' => 3],
            ['title' => 'Kotlin Basics', 'order' => 1],
            ['title' => 'Android Architecture', 'order' => 2],
            ['title' => 'Jetpack Compose', 'order' => 3],
        ];

        $sectionIndex = 0;
        foreach ($courses as $course) {
            for ($i = 0; $i < 3; $i++) {
                $section = $sections[$sectionIndex];
                $section['course_id'] = $course->id;
                Section::create($section);
                $sectionIndex++;
            }
        }
    }
}
