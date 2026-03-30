<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

final class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->offset(10)->limit(10)->get();
        $courses = Course::orderBy('id')->limit(10)->get();
        $lessons = Lesson::orderBy('id')->get();

        $comments = [
            ['comment' => 'Great introduction to Laravel!', 'commentable_type' => Course::class, 'commentable_id' => $courses[0]->id],
            ['comment' => 'Advanced JS concepts explained well.', 'commentable_type' => Course::class, 'commentable_id' => $courses[1]->id],
            ['comment' => 'Clear explanation of Laravel basics.', 'commentable_type' => Lesson::class, 'commentable_id' => $lessons[0]->id],
            ['comment' => 'Python for DS is perfect for beginners.', 'commentable_type' => Course::class, 'commentable_id' => $courses[2]->id],
            ['comment' => 'Python syntax is easy to follow.', 'commentable_type' => Lesson::class, 'commentable_id' => $lessons[6]->id],
            ['comment' => 'TensorFlow course is comprehensive.', 'commentable_type' => Course::class, 'commentable_id' => $courses[3]->id],
            ['comment' => 'iOS development made simple.', 'commentable_type' => Course::class, 'commentable_id' => $courses[4]->id],
            ['comment' => 'Swift basics are well covered.', 'commentable_type' => Lesson::class, 'commentable_id' => $lessons[12]->id],
            ['comment' => 'Ethical hacking fundamentals are crucial.', 'commentable_type' => Course::class, 'commentable_id' => $courses[5]->id],
            ['comment' => 'AWS architecture is advanced but clear.', 'commentable_type' => Course::class, 'commentable_id' => $courses[6]->id],
        ];

        foreach ($users as $index => $user) {
            if (!isset($comments[$index])) {
                break;
            }
            $comment = $comments[$index];
            $comment['user_id'] = $user->id;
            Comment::create($comment);
        }
    }
}
