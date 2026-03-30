<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Database\Seeder;

final class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $sections = Section::orderBy('id')->get();

        $lessonsPerSection = [
            ['What is Laravel?', 'Introduction to Laravel framework and its benefits.'],
            ['Installing Laravel', 'Step-by-step installation guide.'],
            ['Project Structure', 'Understanding Laravel project structure.'],
            ['Basic Routing', 'Creating routes in Laravel.'],
            ['Route Parameters', 'Working with route parameters.'],
            ['Controllers', 'Creating and using controllers.'],
            ['Models and Migrations', 'Creating models and database migrations.'],
            ['Eloquent ORM', 'Using Eloquent for database operations.'],
            ['Relationships', 'Defining model relationships.'],
            ['Closures and Callbacks', 'Advanced function concepts.'],
            ['Prototypes', 'Understanding JavaScript prototypes.'],
            ['ES6 Features', 'Modern JavaScript features.'],
            ['Promises', 'Working with asynchronous code.'],
            ['Async/Await', 'Using async/await syntax.'],
            ['Error Handling', 'Handling errors in async code.'],
            ['Modules', 'ES6 modules and beyond.'],
            ['Classes', 'ES6 classes and inheritance.'],
            ['Destructuring', 'Array and object destructuring.'],
            ['Python Syntax', 'Basic Python syntax and data types.'],
            ['Control Structures', 'Loops and conditionals.'],
            ['Functions', 'Defining and using functions.'],
            ['NumPy Arrays', 'Working with NumPy arrays.'],
            ['Pandas DataFrames', 'Using Pandas for data manipulation.'],
            ['Data Cleaning', 'Cleaning and preprocessing data.'],
            ['Matplotlib Basics', 'Creating basic plots.'],
            ['Seaborn', 'Advanced data visualization.'],
            ['Interactive Plots', 'Creating interactive visualizations.'],
            ['Neural Network Basics', 'Understanding neural networks.'],
            ['TensorFlow Setup', 'Installing and setting up TensorFlow.'],
            ['Building Models', 'Creating your first ML model.'],
            ['Training Process', 'How to train ML models.'],
            ['Evaluation Metrics', 'Measuring model performance.'],
            ['Overfitting', 'Understanding and preventing overfitting.'],
            ['Model Deployment', 'Deploying ML models to production.'],
            ['TensorFlow Serving', 'Using TensorFlow Serving.'],
            ['Monitoring', 'Monitoring deployed models.'],
        ];

        $lessonIndex = 0;
        foreach ($sections as $section) {
            for ($i = 0; $i < 3; $i++) {
                if ($lessonIndex >= count($lessonsPerSection)) {
                    $lessonIndex = 0;
                }
                $lessonData = $lessonsPerSection[$lessonIndex];
                Lesson::create([
                    'section_id' => $section->id,
                    'title' => $lessonData[0],
                    'content' => $lessonData[1],
                    'order' => $i + 1,
                ]);
                $lessonIndex++;
            }
        }
    }
}
