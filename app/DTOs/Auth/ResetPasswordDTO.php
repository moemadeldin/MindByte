<?php

declare(strict_types=1);

namespace App\DTOs\Auth;

final readonly class ResetPasswordDTO
{
    public function __construct(
        public string $token,
        public string $email,
        public string $password,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['token'],
            $data['email'],
            $data['password'],
        );
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
