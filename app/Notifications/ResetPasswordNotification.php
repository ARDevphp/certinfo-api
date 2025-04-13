<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public string $token;
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function via(): array
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $url = config('app.frontend_url') . "/users/reset-password?secretKey={$this->token}";

        return (new MailMessage)
            ->subject('Parolni tiklash')
            ->line('Parolni tiklash uchun quyidagi tugmani bosing:')
            ->action('Parolni tiklash', $url)
            ->line('Agar siz so‘rov yubormagan bo‘lsangiz, bu xabarni e’tiborsiz qoldiring.');
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token,
        ];
    }
}
