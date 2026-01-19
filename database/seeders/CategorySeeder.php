<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Development'],
            ['name' => 'Data Science'],
            ['name' => 'Machine Learning'],
            ['name' => 'Mobile Development'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Cloud Computing'],
            ['name' => 'DevOps'],
            ['name' => 'Artificial Intelligence'],
            ['name' => 'Blockchain'],
            ['name' => 'Game Development'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
