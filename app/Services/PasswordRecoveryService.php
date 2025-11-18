<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\Auth\ForgotPasswordDTO;
use App\DTOs\Auth\ResetPasswordDTO;
use App\Events\PasswordResetTokenCreated;
use App\Interfaces\PasswordRecoveryServiceInterface;
use App\Models\User;
use App\Notifications\PasswordChangedNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class PasswordRecoveryService implements PasswordRecoveryServiceInterface
{
    public function forgotPassword(ForgotPasswordDTO $dto): User
    {
        return DB::transaction(function () use ($dto): User {

            $user = User::getUserByEmail($dto->email)->first();
            $code = $this->generateAndUpdateUserWithRandomVerificationCode();
            $user->update([
                'verification_code' => $code,
            ]);

            event(new PasswordResetTokenCreated($user, $code));

            return $user;
        });
    }

    public function resetPassword(ResetPasswordDTO $dto): User
    {
        $user = User::getUserByEmail($dto->email)
            ->where('verification_code', $dto->verification_code)
            ->first();

        $user->update([
            'verification_code' => null,
            'password' => Hash::make($dto->password),
        ]);

        $user->notify(new PasswordChangedNotification($user));

        return $user;
    }

    private function generateAndUpdateUserWithRandomVerificationCode(): int
    {
        return random_int(User::MIN_VERIFICATION_CODE, User::MAX_VERIFICATION_CODE);
    }
}
