<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

final class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->limit(20)->get();

        $profiles = [
            ['first_name' => 'John', 'last_name' => 'Doe', 'avatar' => 'https://example.com/avatars/john.jpg', 'bio' => 'Experienced web developer specializing in Laravel.'],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'avatar' => 'https://example.com/avatars/jane.jpg', 'bio' => 'Front-end expert with React and JavaScript mastery.'],
            ['first_name' => 'Alice', 'last_name' => 'Johnson', 'avatar' => 'https://example.com/avatars/alice.jpg', 'bio' => 'Data scientist passionate about Python and ML.'],
            ['first_name' => 'Bob', 'last_name' => 'Brown', 'avatar' => 'https://example.com/avatars/bob.jpg', 'bio' => 'AI researcher focusing on TensorFlow applications.'],
            ['first_name' => 'Charlie', 'last_name' => 'Wilson', 'avatar' => 'https://example.com/avatars/charlie.jpg', 'bio' => 'iOS developer with Swift expertise.'],
            ['first_name' => 'Diana', 'last_name' => 'Davis', 'avatar' => 'https://example.com/avatars/diana.jpg', 'bio' => 'Cybersecurity professional and ethical hacker.'],
            ['first_name' => 'Edward', 'last_name' => 'Miller', 'avatar' => 'https://example.com/avatars/edward.jpg', 'bio' => 'Cloud architect specializing in AWS.'],
            ['first_name' => 'Fiona', 'last_name' => 'Garcia', 'avatar' => 'https://example.com/avatars/fiona.jpg', 'bio' => 'DevOps engineer with container expertise.'],
            ['first_name' => 'George', 'last_name' => 'Rodriguez', 'avatar' => 'https://example.com/avatars/george.jpg', 'bio' => 'Computer vision specialist with OpenCV.'],
            ['first_name' => 'Helen', 'last_name' => 'Martinez', 'avatar' => 'https://example.com/avatars/helen.jpg', 'bio' => 'Blockchain developer and smart contract expert.'],
            ['first_name' => 'Ian', 'last_name' => 'Anderson', 'avatar' => 'https://example.com/avatars/ian.jpg', 'bio' => 'Unity game developer and 3D artist.'],
            ['first_name' => 'Julia', 'last_name' => 'Taylor', 'avatar' => 'https://example.com/avatars/julia.jpg', 'bio' => 'React Native developer for mobile apps.'],
            ['first_name' => 'Kevin', 'last_name' => 'Thomas', 'avatar' => 'https://example.com/avatars/kevin.jpg', 'bio' => 'D3.js specialist for data visualizations.'],
            ['first_name' => 'Laura', 'last_name' => 'Jackson', 'avatar' => 'https://example.com/avatars/laura.jpg', 'bio' => 'NLP researcher with deep learning focus.'],
            ['first_name' => 'Michael', 'last_name' => 'White', 'avatar' => 'https://example.com/avatars/michael.jpg', 'bio' => 'Android developer using Kotlin.'],
            ['first_name' => 'Nancy', 'last_name' => 'Harris', 'avatar' => null, 'bio' => 'Software engineering student.'],
            ['first_name' => 'Oliver', 'last_name' => 'Clark', 'avatar' => null, 'bio' => 'Tech enthusiast learning web development.'],
            ['first_name' => 'Paula', 'last_name' => 'Lewis', 'avatar' => null, 'bio' => 'Mobile app developer.'],
            ['first_name' => 'Quincy', 'last_name' => 'Robinson', 'avatar' => null, 'bio' => 'Data analyst and Python programmer.'],
            ['first_name' => 'Rachel', 'last_name' => 'Walker', 'avatar' => null, 'bio' => 'Beginner in programming.'],
        ];

        foreach ($users as $index => $user) {
            $profile = $profiles[$index];
            $profile['user_id'] = $user->id;
            Profile::create($profile);
        }
    }
}
