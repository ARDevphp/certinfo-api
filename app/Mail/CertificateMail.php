<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $certificate)
    {
    }

    public function build()
    {
        return $this->view('emails.certificate')
            ->subject('Sizning sertifikatingiz')
            ->attachData($this->certificate['pdf'], 'certificate.pdf', [
                'mime' => 'application/pdf',
            ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Certificate Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
