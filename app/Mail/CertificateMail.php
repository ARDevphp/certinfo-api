<?php

namespace App\Mail;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(private Certificate $certificate)
    {
    }

    public function build()
    {
        return $this->subject('Serticatni oling iltimos')
                    ->view('emails.edd', ['certificate' => $this->certificate])
                    ->with(['certificate' => $this->certificate]);
    }
}
