<?php

declare(strict_types=1);

namespace App\DTOs\Auth;

final readonly class ResetPasswordDTO
{
    public function __construct(
        public string $email,
        public string $verification_code,
        public string $password,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['email'],
            $data['verification_code'],
            $data['password'],
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'verification_code' => $this->verification_code,
            'password' => $this->password,
        ];
    }
}
