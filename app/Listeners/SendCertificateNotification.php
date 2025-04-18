<?php

namespace App\Listeners;

use App\Events\CertificateCreated;
use App\Jobs\SendCertificateMailJob;

class SendCertificateNotification
{
    public function handle(CertificateCreated $event): void
    {
        $user = $event->certificate->student_email;

        dispatch(new SendCertificateMailJob($event->certificate, $user));
    }
}
