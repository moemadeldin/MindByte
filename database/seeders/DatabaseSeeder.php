<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            UserRoleSeeder::class,
            CategorySeeder::class,
            ProfileSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            SectionSeeder::class,
            LessonSeeder::class,
            AttachmentSeeder::class,
            CommentSeeder::class,
            ReviewSeeder::class,
            EnrollmentSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
        ]);
    }
}
