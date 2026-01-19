<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\Auth\TeacherRegistrationDTO;
use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class TeacherRegistrationAction
{
    public function execute(TeacherRegistrationDTO $dto): User
    {
        return DB::transaction(function () use ($dto): User {
            $user = User::create($dto->toUserArray());
            $user->teacher()->create($dto->toTeacherArray());

            $roleId = Role::roleByName(Roles::TEACHER->value)->value('id');
            $user->roles()->attach($roleId);
            $user->profile()->create($dto->toProfileArray());

            return $user;
        });
    }
}
