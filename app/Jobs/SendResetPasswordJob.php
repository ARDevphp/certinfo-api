<?php

namespace App\Jobs;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendResetPasswordJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public User $user)
    {
    }

    public function handle(): void
    {
        Mail::to($this->user->email)->send(new ResetPasswordMail($this->user));
    }
}
