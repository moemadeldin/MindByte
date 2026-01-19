<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use App\Enums\Roles;
use App\Interfaces\AuthServiceInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class AuthService implements AuthServiceInterface
{
    public function register(RegisterDTO $dto): User
    {
        return DB::transaction(function () use ($dto): User {
            $user = User::create($dto->toArray());
            $user->profile()->create();
            $roleId = Role::roleByName(Roles::USER->value)->value('id');
            $user->roles()->attach($roleId);

            return $user;
        });
    }

    public function login(LoginDTO $dto): User
    {
        $user = User::getUserByEmail($dto->email)->first();

        if (! $user || ! Hash::check($dto->password, $user->password)) {
            throw new AuthenticationException('Invalid Credentials');
        }
        if (! $user->isActive()) {
            throw new AuthenticationException('User is blocked');
        }

        return $user;
    }
}
