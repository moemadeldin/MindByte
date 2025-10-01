<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\PasswordResetTokenCreated;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

final class SendPasswordResetNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PasswordResetTokenCreated $event): void
    {
        Mail::to($event->user->email)->queue(new ResetPasswordMail($event->user, $event->resetToken));
    }
}
