<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Pagination;
use App\Interfaces\TeacherRegistrationAdminServiceInterface;
use App\Models\Teacher;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class TeacherRegistrationAdminService implements TeacherRegistrationAdminServiceInterface
{
    public function getPendingRequests(): LengthAwarePaginator
    {
        return Teacher::TeacherWithRequests()
            ->paginate(Pagination::TEACHER_REQUESTS_PER_PAGE->value)
            ->withQueryString();
    }

    public function accept(Teacher $teacher): void
    {
        $teacher->update([
            'is_approved' => true,
            'is_active' => true,
            'hire_date' => now(),
        ]);
    }

    public function reject(Teacher $teacher): void
    {
        $teacher->delete();
    }
}
