<?php

namespace App\Jobs;

use App\Models\Certificate;
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

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
