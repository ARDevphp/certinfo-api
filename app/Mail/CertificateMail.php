<?php

namespace App\Mail;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate;
    public $pdf;

    public function __construct(Certificate $certificate, $pdf)
    {
        $this->certificate = $certificate;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->view('emails.certificate')
            ->subject('Sizning Sertifikatingiz')
            ->attachData($this->pdf->output(), 'certificate.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
