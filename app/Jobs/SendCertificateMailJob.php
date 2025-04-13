<?php

namespace App\Jobs;

use App\Mail\CertificateMail;
use App\Models\Certificate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendCertificateMailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public Certificate $certificate, public string $to)
    {
    }

    public function handle(): void
    {
        Mail::to($this->to)->send(new CertificateMail($this->certificate));
    }
}
