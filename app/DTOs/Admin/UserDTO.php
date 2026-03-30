<?php

declare(strict_types=1);

namespace App\DTOs\Admin;

final readonly class UserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
        public string $is_active,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
            $data['role'],
            $data['is_active'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
            'is_active' => $this->is_active,
        ];
    }
}
