<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\Auth\TeacherRegistrationDTO;
use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;
use App\Services\BillingSyncService; // Import your service
use Illuminate\Support\Facades\DB;

final class TeacherRegistrationAction
{
    public function __construct(
        private readonly BillingSyncService $billingSyncService
    ) {}

    public function execute(TeacherRegistrationDTO $dto): User
    {
        \Log::info("Action: Starting registration for " . $dto->email);
        // 1. Save everything to your local database first
        $user = DB::transaction(function () use ($dto): User {
            $user = User::create($dto->toUserArray());
            $user->teacher()->create($dto->toTeacherArray());

            $roleId = Role::roleByName(Roles::TEACHER->value)->value('id');
            $user->roles()->attach($roleId);
            $user->profile()->create($dto->toProfileArray());

            return $user;
        });
        \Log::info("Action: Transaction complete. Calling Sync Service.");
        // 2. Now that the transaction is finished and the user is 100% saved,
        // sync them to SyncInvoice.
        $this->billingSyncService->provisionTeacher($user, $dto->password);

        return $user;
    }
}