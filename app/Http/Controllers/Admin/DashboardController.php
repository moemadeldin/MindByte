<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\View\View;
use App\Models\User;

final class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $users = User::activeUsersCount()->count();
        $teachers = User::activeTeachers()->count();
        $courses = Course::with('teacher')->count();
        $teacherRequests = Teacher::teacherWithRequests()->count();
        return view('dashboard.analytics', compact(['users', 'teachers', 'courses', 'teacherRequests']));
    }
}
