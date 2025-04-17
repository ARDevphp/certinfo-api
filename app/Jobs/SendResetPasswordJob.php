<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

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
