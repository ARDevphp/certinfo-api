<?php

namespace App\Listeners;

use App\Events\CertificateCreated;

class SendCertificateMail
{
    public function __construct()
    {
    }

    public function handle(CertificateCreated $event): void
    {
    }
}
