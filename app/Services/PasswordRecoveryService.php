<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\TokenManagerAction;
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
    public function __construct(private readonly TokenManagerAction $tokenManagerAction) {}

    public function forgotPassword(ForgotPasswordDTO $dto): User
    {
        return DB::transaction(function () use ($dto): User {

            $user = User::getUserByEmail($dto->email)->first();

            $token = $this->tokenManagerAction->execute($user);

            event(new PasswordResetTokenCreated($user, $token));

            return $user;
        });
    }

    public function resetPassword(ResetPasswordDTO $dto): User|bool
    {
        $user = User::getUserByEmail($dto->email)->first();

        $tokenRecord = User::getTokenByEmail($dto->email)->first();

        if (! Hash::check($dto->token, $tokenRecord->token)) {
            return false;
        }
        $user->update([
            'password' => Hash::make($dto->password),
        ]);
        User::getTokenByEmail($dto->email)->delete();
        $user->notify(new PasswordChangedNotification($user));

        return $user;
    }
}
