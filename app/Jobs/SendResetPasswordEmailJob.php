<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ResetPasswordNotification;

class SendResetPasswordEmailJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public User $user, public string $token)
    {
    }

    public function handle(): void
    {
        $this->user->notify(new ResetPasswordNotification($this->token));
    }
}
