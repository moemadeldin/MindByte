<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\Admin\UserDTO;
use App\Interfaces\UserServiceInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class UserService implements UserServiceInterface
{
    public function createUser(UserDTO $dto): User
    {
        return DB::transaction(function () use ($dto): User {
            $user = User::create($dto->toArray());
            $roleId = Role::roleByName($dto->role)->value('id');
            $user->roles()->attach($roleId);

            return $user;
        });
    }

    public function updateUser(UserDTO $dto, User $user): User
    {
        return DB::transaction(function () use ($dto, $user): User {
            $user->update($dto->toArray());
            $roleId = Role::roleByName($dto->role)->value('id');
            $user->roles()->sync([$roleId]);

            return $user;
        });
    }
}
