<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\Roles;
use App\Models\Course;
use App\Models\User;

final class CoursePolicy
{
    public function create(User $user): bool
    {
        return $user->hasAnyRole([Roles::ADMIN->value, Roles::TEACHER->value]);
    }

    public function update(User $user, Course $course): bool
    {
        return $this->isAdminOrCourseOwner($user, $course);
    }

    public function delete(User $user, Course $course): bool
    {
        return $this->isAdminOrCourseOwner($user, $course);
    }

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole([Roles::ADMIN->value, Roles::TEACHER->value]);
    }

    private function isAdminOrCourseOwner(User $user, Course $course): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $user->isTeacher() && $course->user_id === $user->id;
    }
}
