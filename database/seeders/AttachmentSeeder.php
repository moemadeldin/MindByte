<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\LessonAttachment;
use Illuminate\Database\Seeder;

final class AttachmentSeeder extends Seeder
{
    public function run(): void
    {
        $lessons = Lesson::orderBy('id')->limit(10)->get();

        $attachments = [
            ['name' => 'Laravel Installation Guide', 'type' => 'pdf', 'url' => 'https://example.com/laravel-install.pdf', 'size' => '2048000'],
            ['name' => 'Routing Cheat Sheet', 'type' => 'pdf', 'url' => 'https://example.com/routing-cheat.pdf', 'size' => '1024000'],
            ['name' => 'JavaScript Advanced Concepts', 'type' => 'document', 'url' => 'https://example.com/js-advanced.doc', 'size' => '1536000'],
            ['name' => 'Python Basics Slides', 'type' => 'ppt', 'url' => 'https://example.com/python-basics.ppt', 'size' => '2560000'],
            ['name' => 'Neural Networks Video', 'type' => 'video', 'url' => 'https://example.com/neural-nets.mp4', 'size' => '104857600'],
            ['name' => 'Swift Programming Guide', 'type' => 'pdf', 'url' => 'https://example.com/swift-guide.pdf', 'size' => '3072000'],
            ['name' => 'Hacking Tools List', 'type' => 'document', 'url' => 'https://example.com/hacking-tools.doc', 'size' => '512000'],
            ['name' => 'AWS Services Overview', 'type' => 'pdf', 'url' => 'https://example.com/aws-services.pdf', 'size' => '2048000'],
            ['name' => 'Docker Commands', 'type' => 'document', 'url' => 'https://example.com/docker-commands.doc', 'size' => '768000'],
            ['name' => 'OpenCV Tutorial', 'type' => 'video', 'url' => 'https://example.com/opencv-tutorial.mp4', 'size' => '52428800'],
        ];

        foreach ($lessons as $index => $lesson) {
            $attachment = $attachments[$index];
            $attachment['lesson_id'] = $lesson->id;
            LessonAttachment::create($attachment);
        }
    }
}
