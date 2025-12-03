<?php

declare(strict_types=1);

namespace App\DTOs\Auth;

use Illuminate\Http\UploadedFile;

final readonly class UpdateProfileDTO
{
    public function __construct(
        public ?string $first_name,
        public ?string $last_name,
        public ?string $email,
        public ?string $bio,
        public ?string $national_id,
        public ?UploadedFile $avatar,
        public ?string $title,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['bio'],
            $data['national_id'] ?? null,
            array_key_exists('avatar', $data) ? $data['avatar'] : null,
            $data['title'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'bio' => $this->bio,
            'national_id' => $this->national_id,
            'avatar' => $this->avatar,
            'title' => $this->title,
        ];
    }
}
