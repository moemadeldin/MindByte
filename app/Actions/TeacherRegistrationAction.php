<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\Auth\TeacherRegistrationDTO;
use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;
use App\Services\BillingSyncService;
use Illuminate\Support\Facades\DB;

final class TeacherRegistrationAction
{
    public function __construct(
        private readonly BillingSyncService $billingSyncService
    ) {}

    public function execute(TeacherRegistrationDTO $dto): User
    {
        \Log::info("Action: Starting registration for " . $dto->email);
        $user = DB::transaction(function () use ($dto): User {
            $user = User::create($dto->toUserArray());
            $user->teacher()->create($dto->toTeacherArray());

            $roleId = Role::roleByName(Roles::TEACHER->value)->value('id');
            $user->roles()->attach($roleId);
            $user->profile()->create($dto->toProfileArray());

            return $user;
        });
        \Log::info("Action: Transaction complete. Calling Sync Service.");

        $this->billingSyncService->provisionTeacher($user, $dto->password);

        return $user;
    }
}