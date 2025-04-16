<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected User $user)
    {
    }

    public function build()
    {
        return $this->subject('Parol yangilandi')
            ->view('emails.userEmail', ['user' => $this->user])
            ->with(['user' => $this->user->email]);
    }
}
