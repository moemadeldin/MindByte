<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\CourseLevel;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

final class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->limit(10)->get();
        $categories = Category::orderBy('id')->get();

        $courses = [
            ['name' => 'Introduction to Laravel', 'thumbnail' => 'https://example.com/laravel-intro.jpg', 'description' => 'Learn the basics of Laravel framework', 'long_description' => 'This comprehensive course covers everything you need to know to get started with Laravel, including routing, controllers, models, and more.', 'price' => 99.99, 'is_free' => false, 'level' => CourseLevel::BEGINNER->value, 'language' => 'en', 'requirements' => ['Basic PHP knowledge', 'HTML/CSS basics']],
            ['name' => 'Advanced JavaScript', 'thumbnail' => 'https://example.com/js-advanced.jpg', 'description' => 'Master advanced JavaScript concepts', 'long_description' => 'Dive deep into closures, prototypes, async programming, and modern JavaScript features.', 'price' => 149.99, 'is_free' => false, 'level' => CourseLevel::ADVANCED->value, 'language' => 'en', 'requirements' => ['Intermediate JavaScript', 'ES6 knowledge']],
            ['name' => 'Python for Data Science', 'thumbnail' => 'https://example.com/python-ds.jpg', 'description' => 'Learn Python for data analysis', 'long_description' => 'Master Python libraries like Pandas, NumPy, and Matplotlib for data science projects.', 'price' => 129.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['Basic Python', 'Math fundamentals']],
            ['name' => 'Machine Learning with TensorFlow', 'thumbnail' => 'https://example.com/tf-ml.jpg', 'description' => 'Build ML models with TensorFlow', 'long_description' => 'Learn to create neural networks, train models, and deploy ML applications using TensorFlow.', 'price' => 199.99, 'is_free' => false, 'level' => CourseLevel::ADVANCED->value, 'language' => 'en', 'requirements' => ['Python', 'Linear Algebra']],
            ['name' => 'iOS App Development', 'thumbnail' => 'https://example.com/ios-dev.jpg', 'description' => 'Create iOS apps with Swift', 'long_description' => 'From basics to advanced iOS development, learn SwiftUI, UIKit, and app store deployment.', 'price' => 179.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['Swift basics', 'Xcode familiarity']],
            ['name' => 'Ethical Hacking Fundamentals', 'thumbnail' => 'https://example.com/hacking.jpg', 'description' => 'Learn ethical hacking techniques', 'long_description' => 'Discover penetration testing, vulnerability assessment, and cybersecurity best practices.', 'price' => 159.99, 'is_free' => false, 'level' => CourseLevel::BEGINNER->value, 'language' => 'en', 'requirements' => ['Basic networking', 'Linux knowledge']],
            ['name' => 'AWS Cloud Architecture', 'thumbnail' => 'https://example.com/aws-cloud.jpg', 'description' => 'Design scalable cloud solutions', 'long_description' => 'Master AWS services, architecture patterns, and best practices for cloud computing.', 'price' => 189.99, 'is_free' => false, 'level' => CourseLevel::ADVANCED->value, 'language' => 'en', 'requirements' => ['Basic cloud concepts', 'Networking']],
            ['name' => 'Docker and Kubernetes', 'thumbnail' => 'https://example.com/docker-k8s.jpg', 'description' => 'Containerization and orchestration', 'long_description' => 'Learn Docker containers, Kubernetes orchestration, and DevOps practices.', 'price' => 169.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['Linux basics', 'Command line']],
            ['name' => 'Computer Vision with OpenCV', 'thumbnail' => 'https://example.com/opencv-cv.jpg', 'description' => 'Build computer vision applications', 'long_description' => 'Master image processing, object detection, and AI vision projects with OpenCV.', 'price' => 139.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['Python', 'Math']],
            ['name' => 'Blockchain Development', 'thumbnail' => 'https://example.com/blockchain.jpg', 'description' => 'Create blockchain applications', 'long_description' => 'Learn smart contracts, DApps, and blockchain technology fundamentals.', 'price' => 199.99, 'is_free' => false, 'level' => CourseLevel::ADVANCED->value, 'language' => 'en', 'requirements' => ['Programming basics', 'Cryptography']],
            ['name' => 'Unity Game Development', 'thumbnail' => 'https://example.com/unity-games.jpg', 'description' => 'Create games with Unity', 'long_description' => 'From 2D to 3D games, learn Unity engine, C# scripting, and game design.', 'price' => 149.99, 'is_free' => false, 'level' => CourseLevel::BEGINNER->value, 'language' => 'en', 'requirements' => ['Basic programming', 'Creativity']],
            ['name' => 'React Native Mobile Apps', 'thumbnail' => 'https://example.com/react-native.jpg', 'description' => 'Cross-platform mobile development', 'long_description' => 'Build iOS and Android apps with React Native and JavaScript.', 'price' => 129.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['JavaScript', 'React basics']],
            ['name' => 'Data Visualization with D3.js', 'thumbnail' => 'https://example.com/d3-viz.jpg', 'description' => 'Create interactive data visualizations', 'long_description' => 'Master D3.js for creating stunning, interactive data visualizations on the web.', 'price' => 119.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['JavaScript', 'SVG basics']],
            ['name' => 'Natural Language Processing', 'thumbnail' => 'https://example.com/nlp.jpg', 'description' => 'AI text analysis and generation', 'long_description' => 'Learn NLP techniques, sentiment analysis, and language models.', 'price' => 179.99, 'is_free' => false, 'level' => CourseLevel::ADVANCED->value, 'language' => 'en', 'requirements' => ['Python', 'Machine Learning basics']],
            ['name' => 'Android Development with Kotlin', 'thumbnail' => 'https://example.com/android-kotlin.jpg', 'description' => 'Modern Android app development', 'long_description' => 'Build Android apps with Kotlin, Jetpack Compose, and modern Android architecture.', 'price' => 159.99, 'is_free' => false, 'level' => CourseLevel::INTERMEDIATE->value, 'language' => 'en', 'requirements' => ['Java/Kotlin basics', 'Android Studio']],
        ];

        $courseCategoryMap = [0, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 3, 1, 2, 3];

        foreach ($courses as $index => $course) {
            $course['user_id'] = $users->get($index % 10)->id;
            $course['category_id'] = $categories->get($courseCategoryMap[$index])->id;
            $course['requirements'] = json_encode($course['requirements']);
            Course::create($course);
        }
    }
}
