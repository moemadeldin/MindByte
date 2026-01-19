<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

final class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            ['user_id' => 11, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 1, 'comment' => 'Great introduction to Laravel!'],
            ['user_id' => 12, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 2, 'comment' => 'Advanced JS concepts explained well.'],
            ['user_id' => 13, 'commentable_type' => 'App\\Models\\Lesson', 'commentable_id' => 1, 'comment' => 'Clear explanation of Laravel basics.'],
            ['user_id' => 14, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 3, 'comment' => 'Python for DS is perfect for beginners.'],
            ['user_id' => 15, 'commentable_type' => 'App\\Models\\Lesson', 'commentable_id' => 7, 'comment' => 'Python syntax is easy to follow.'],
            ['user_id' => 16, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 4, 'comment' => 'TensorFlow course is comprehensive.'],
            ['user_id' => 17, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 5, 'comment' => 'iOS development made simple.'],
            ['user_id' => 18, 'commentable_type' => 'App\\Models\\Lesson', 'commentable_id' => 13, 'comment' => 'Swift basics are well covered.'],
            ['user_id' => 19, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 6, 'comment' => 'Ethical hacking fundamentals are crucial.'],
            ['user_id' => 20, 'commentable_type' => 'App\\Models\\Course', 'commentable_id' => 7, 'comment' => 'AWS architecture is advanced but clear.'],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
