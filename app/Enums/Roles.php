<?php

declare(strict_types=1);

namespace App\Enums;

enum Roles: string
{
    case USER = 'user';
    case TEACHER = 'teacher';
    case ADMIN = 'admin';

    public static function optionsWithoutAdmin(): array
    {
        return collect(self::cases())
            ->reject(fn ($role) => $role === self::ADMIN)
            ->mapWithKeys(fn ($role) => [$role->value => $role->label()])
            ->toArray();
    }

    public function label(): string
    {
        return match ($this) {
            self::USER => 'User',
            self::TEACHER => 'Teacher',
            self::ADMIN => 'Admin',
        };
    }
}
