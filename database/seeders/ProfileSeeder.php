<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

final class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            ['user_id' => 1, 'first_name' => 'John', 'last_name' => 'Doe', 'avatar' => 'https://example.com/avatars/john.jpg', 'bio' => 'Experienced web developer specializing in Laravel.'],
            ['user_id' => 2, 'first_name' => 'Jane', 'last_name' => 'Smith', 'avatar' => 'https://example.com/avatars/jane.jpg', 'bio' => 'Front-end expert with React and JavaScript mastery.'],
            ['user_id' => 3, 'first_name' => 'Alice', 'last_name' => 'Johnson', 'avatar' => 'https://example.com/avatars/alice.jpg', 'bio' => 'Data scientist passionate about Python and ML.'],
            ['user_id' => 4, 'first_name' => 'Bob', 'last_name' => 'Brown', 'avatar' => 'https://example.com/avatars/bob.jpg', 'bio' => 'AI researcher focusing on TensorFlow applications.'],
            ['user_id' => 5, 'first_name' => 'Charlie', 'last_name' => 'Wilson', 'avatar' => 'https://example.com/avatars/charlie.jpg', 'bio' => 'iOS developer with Swift expertise.'],
            ['user_id' => 6, 'first_name' => 'Diana', 'last_name' => 'Davis', 'avatar' => 'https://example.com/avatars/diana.jpg', 'bio' => 'Cybersecurity professional and ethical hacker.'],
            ['user_id' => 7, 'first_name' => 'Edward', 'last_name' => 'Miller', 'avatar' => 'https://example.com/avatars/edward.jpg', 'bio' => 'Cloud architect specializing in AWS.'],
            ['user_id' => 8, 'first_name' => 'Fiona', 'last_name' => 'Garcia', 'avatar' => 'https://example.com/avatars/fiona.jpg', 'bio' => 'DevOps engineer with container expertise.'],
            ['user_id' => 9, 'first_name' => 'George', 'last_name' => 'Rodriguez', 'avatar' => 'https://example.com/avatars/george.jpg', 'bio' => 'Computer vision specialist with OpenCV.'],
            ['user_id' => 10, 'first_name' => 'Helen', 'last_name' => 'Martinez', 'avatar' => 'https://example.com/avatars/helen.jpg', 'bio' => 'Blockchain developer and smart contract expert.'],
            ['user_id' => 11, 'first_name' => 'Ian', 'last_name' => 'Anderson', 'avatar' => 'https://example.com/avatars/ian.jpg', 'bio' => 'Unity game developer and 3D artist.'],
            ['user_id' => 12, 'first_name' => 'Julia', 'last_name' => 'Taylor', 'avatar' => 'https://example.com/avatars/julia.jpg', 'bio' => 'React Native developer for mobile apps.'],
            ['user_id' => 13, 'first_name' => 'Kevin', 'last_name' => 'Thomas', 'avatar' => 'https://example.com/avatars/kevin.jpg', 'bio' => 'D3.js specialist for data visualizations.'],
            ['user_id' => 14, 'first_name' => 'Laura', 'last_name' => 'Jackson', 'avatar' => 'https://example.com/avatars/laura.jpg', 'bio' => 'NLP researcher with deep learning focus.'],
            ['user_id' => 15, 'first_name' => 'Michael', 'last_name' => 'White', 'avatar' => 'https://example.com/avatars/michael.jpg', 'bio' => 'Android developer using Kotlin.'],
            ['user_id' => 16, 'first_name' => 'Nancy', 'last_name' => 'Harris', 'avatar' => null, 'bio' => 'Software engineering student.'],
            ['user_id' => 17, 'first_name' => 'Oliver', 'last_name' => 'Clark', 'avatar' => null, 'bio' => 'Tech enthusiast learning web development.'],
            ['user_id' => 18, 'first_name' => 'Paula', 'last_name' => 'Lewis', 'avatar' => null, 'bio' => 'Mobile app developer.'],
            ['user_id' => 19, 'first_name' => 'Quincy', 'last_name' => 'Robinson', 'avatar' => null, 'bio' => 'Data analyst and Python programmer.'],
            ['user_id' => 20, 'first_name' => 'Rachel', 'last_name' => 'Walker', 'avatar' => null, 'bio' => 'Beginner in programming.'],
        ];

        foreach ($profiles as $profile) {
            Profile::create($profile);
        }
    }
}
