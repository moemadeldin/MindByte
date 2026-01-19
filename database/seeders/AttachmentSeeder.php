<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\LessonAttachment;
use Illuminate\Database\Seeder;

final class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attachments = [
            ['lesson_id' => 1, 'name' => 'Laravel Installation Guide', 'type' => 'pdf', 'url' => 'https://example.com/laravel-install.pdf', 'size' => '2048000'],
            ['lesson_id' => 2, 'name' => 'Routing Cheat Sheet', 'type' => 'pdf', 'url' => 'https://example.com/routing-cheat.pdf', 'size' => '1024000'],
            ['lesson_id' => 4, 'name' => 'JavaScript Advanced Concepts', 'type' => 'document', 'url' => 'https://example.com/js-advanced.doc', 'size' => '1536000'],
            ['lesson_id' => 7, 'name' => 'Python Basics Slides', 'type' => 'ppt', 'url' => 'https://example.com/python-basics.ppt', 'size' => '2560000'],
            ['lesson_id' => 10, 'name' => 'Neural Networks Video', 'type' => 'video', 'url' => 'https://example.com/neural-nets.mp4', 'size' => '104857600'],
            ['lesson_id' => 13, 'name' => 'Swift Programming Guide', 'type' => 'pdf', 'url' => 'https://example.com/swift-guide.pdf', 'size' => '3072000'],
            ['lesson_id' => 16, 'name' => 'Hacking Tools List', 'type' => 'document', 'url' => 'https://example.com/hacking-tools.doc', 'size' => '512000'],
            ['lesson_id' => 19, 'name' => 'AWS Services Overview', 'type' => 'pdf', 'url' => 'https://example.com/aws-services.pdf', 'size' => '2048000'],
            ['lesson_id' => 22, 'name' => 'Docker Commands', 'type' => 'document', 'url' => 'https://example.com/docker-commands.doc', 'size' => '768000'],
            ['lesson_id' => 25, 'name' => 'OpenCV Tutorial', 'type' => 'video', 'url' => 'https://example.com/opencv-tutorial.mp4', 'size' => '52428800'],
        ];

        foreach ($attachments as $attachment) {
            LessonAttachment::create($attachment);
        }
    }
}
