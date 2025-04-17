<?php

namespace App\Listeners;

use App\Events\CertificateCreated;
use App\Jobs\SendCertificateMailJob;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CertificateCreatedNotification;

class SendCertificateNotification
{
    public function handle(CertificateCreated $event): void
    {
        $user = $event->certificate->student_email;
        Notification::send($user, new CertificateCreatedNotification($event->certificate));

        dispatch(new SendCertificateMailJob($event->certificate, $user));
    }
}
