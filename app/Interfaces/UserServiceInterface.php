<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTOs\Admin\UserDTO;
use App\Models\User;

interface UserServiceInterface
{
    public function createUser(UserDTO $dto): User;

    public function updateUser(UserDTO $dto, User $user): User;
}
