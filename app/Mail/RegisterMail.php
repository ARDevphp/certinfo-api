<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $code)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Admin registratsiya qilish uchun tasdiqlash ko'di",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.register',
            with: ['code' => $this->code]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
