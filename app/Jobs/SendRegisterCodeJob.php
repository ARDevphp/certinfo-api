<?php

namespace App\Jobs;

use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisterCodeJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $email, public string|int $code)
    {

    }

    public function handle(): void
    {
        Mail::to($this->email)->send(new RegisterMail($this->code));
    }
}
