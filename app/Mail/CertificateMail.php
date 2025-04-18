<?php

namespace App\Mail;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(protected Certificate $certificate)
    {
    }

    public function build()
    {
        return $this->subject('EVEREST EDUCATION')
                    ->view('emails.certificate', ['certificate' => $this->certificate])
                    ->with(['certificate' => $this->certificate]);
    }
}
