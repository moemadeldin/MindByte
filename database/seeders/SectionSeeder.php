<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

final class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            // Course 1: Introduction to Laravel
            ['course_id' => 1, 'title' => 'Getting Started', 'order' => 1],
            ['course_id' => 1, 'title' => 'Routing and Controllers', 'order' => 2],
            ['course_id' => 1, 'title' => 'Models and Database', 'order' => 3],
            // Course 2: Advanced JavaScript
            ['course_id' => 2, 'title' => 'Advanced Functions', 'order' => 1],
            ['course_id' => 2, 'title' => 'Async Programming', 'order' => 2],
            ['course_id' => 2, 'title' => 'Modern JavaScript', 'order' => 3],
            // Course 3: Python for Data Science
            ['course_id' => 3, 'title' => 'Python Basics', 'order' => 1],
            ['course_id' => 3, 'title' => 'Pandas and NumPy', 'order' => 2],
            ['course_id' => 3, 'title' => 'Data Visualization', 'order' => 3],
            // Course 4: Machine Learning with TensorFlow
            ['course_id' => 4, 'title' => 'Neural Networks', 'order' => 1],
            ['course_id' => 4, 'title' => 'Training Models', 'order' => 2],
            ['course_id' => 4, 'title' => 'Deployment', 'order' => 3],
            // Course 5: iOS App Development
            ['course_id' => 5, 'title' => 'Swift Basics', 'order' => 1],
            ['course_id' => 5, 'title' => 'UIKit Fundamentals', 'order' => 2],
            ['course_id' => 5, 'title' => 'Advanced iOS Features', 'order' => 3],
            // Course 6: Ethical Hacking
            ['course_id' => 6, 'title' => 'Networking Basics', 'order' => 1],
            ['course_id' => 6, 'title' => 'Scanning and Enumeration', 'order' => 2],
            ['course_id' => 6, 'title' => 'Exploitation Techniques', 'order' => 3],
            // Course 7: AWS Cloud Architecture
            ['course_id' => 7, 'title' => 'AWS Fundamentals', 'order' => 1],
            ['course_id' => 7, 'title' => 'EC2 and Storage', 'order' => 2],
            ['course_id' => 7, 'title' => 'Advanced Services', 'order' => 3],
            // Course 8: Docker and Kubernetes
            ['course_id' => 8, 'title' => 'Docker Basics', 'order' => 1],
            ['course_id' => 8, 'title' => 'Kubernetes Fundamentals', 'order' => 2],
            ['course_id' => 8, 'title' => 'Orchestration', 'order' => 3],
            // Course 9: Computer Vision
            ['course_id' => 9, 'title' => 'Image Processing', 'order' => 1],
            ['course_id' => 9, 'title' => 'Object Detection', 'order' => 2],
            ['course_id' => 9, 'title' => 'Advanced Vision', 'order' => 3],
            // Course 10: Blockchain Development
            ['course_id' => 10, 'title' => 'Blockchain Basics', 'order' => 1],
            ['course_id' => 10, 'title' => 'Smart Contracts', 'order' => 2],
            ['course_id' => 10, 'title' => 'DApps', 'order' => 3],
            // Course 11: Unity Game Development
            ['course_id' => 11, 'title' => 'Unity Interface', 'order' => 1],
            ['course_id' => 11, 'title' => 'C# Scripting', 'order' => 2],
            ['course_id' => 11, 'title' => 'Game Mechanics', 'order' => 3],
            // Course 12: React Native
            ['course_id' => 12, 'title' => 'React Native Basics', 'order' => 1],
            ['course_id' => 12, 'title' => 'Components and Navigation', 'order' => 2],
            ['course_id' => 12, 'title' => 'Native Features', 'order' => 3],
            // Course 13: Data Visualization
            ['course_id' => 13, 'title' => 'D3.js Fundamentals', 'order' => 1],
            ['course_id' => 13, 'title' => 'Scales and Axes', 'order' => 2],
            ['course_id' => 13, 'title' => 'Interactive Charts', 'order' => 3],
            // Course 14: NLP
            ['course_id' => 14, 'title' => 'Text Processing', 'order' => 1],
            ['course_id' => 14, 'title' => 'Sentiment Analysis', 'order' => 2],
            ['course_id' => 14, 'title' => 'Language Models', 'order' => 3],
            // Course 15: Android with Kotlin
            ['course_id' => 15, 'title' => 'Kotlin Basics', 'order' => 1],
            ['course_id' => 15, 'title' => 'Android Architecture', 'order' => 2],
            ['course_id' => 15, 'title' => 'Jetpack Compose', 'order' => 3],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
