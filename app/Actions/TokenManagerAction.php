<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class TokenManagerAction
{
    public function execute(User $user): string
    {
        return DB::transaction(function () use ($user): string {

            $plain = Str::random(60);
            $hashedToken = Hash::make($plain);

            DB::table('password_reset_tokens')->where('email', $user->email)->delete();

            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $hashedToken,
                'created_at' => Carbon::now(),
            ]);

            return $plain;
        });
    }
}
