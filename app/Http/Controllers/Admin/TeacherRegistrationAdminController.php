<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\TeacherRegistrationAdminServiceInterface;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class TeacherRegistrationAdminController extends Controller
{
    public function __construct(private readonly TeacherRegistrationAdminServiceInterface $teacherRegistrationAdminService) {}

    public function index(): View
    {
        $teachers = $this->teacherRegistrationAdminService->getPendingRequests();

        return view('dashboard.teacher-registration.index', compact('teachers'));
    }

    public function accept(Teacher $teacher): RedirectResponse
    {
        $this->teacherRegistrationAdminService->accept($teacher);

        return redirect()->route('teachers.requests.index')->with('success', 'Teacher request accepted');
    }

    public function reject(Teacher $teacher): RedirectResponse
    {
        $this->teacherRegistrationAdminService->reject($teacher);

        return redirect()->route('teachers.requests.index')->with('success', 'Teacher request rejected');
    }
}
