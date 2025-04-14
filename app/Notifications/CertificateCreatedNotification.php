<?php

namespace App\Notifications;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CertificateCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Certificate $certificate)
    {
    }

    public function via(): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->certificate->id,
            'title' => $this->certificate->student_name,
            'created_at' => $this->certificate->created_at
        ];
    }
}
