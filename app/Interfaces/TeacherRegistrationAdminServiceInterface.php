<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Teacher;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TeacherRegistrationAdminServiceInterface
{
    public function getPendingRequests(): LengthAwarePaginator;

    public function accept(Teacher $teacher): void;

    public function reject(Teacher $teacher): void;
}
