<?php

namespace App\Listeners;

use App\Events\CertificateCreated;
use App\Jobs\SendCertificateMailJob;
use App\Notifications\CertificateCreatedNotification;
use Illuminate\Support\Facades\Notification;

class SendCertificateNotification
{
    public function handle(CertificateCreated $event): void
    {
        $user = $event->certificate->student_email;
        Notification::send($user, new CertificateCreatedNotification($event->certificate));

        dispatch(new SendCertificateMailJob($event->certificate, $user));
    }
}
