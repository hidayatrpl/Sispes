<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends BaseVerifyEmail
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verifikasi Email Kamu')
            ->greeting('Halo, ' . $notifiable->nama ?? '')
            ->line('Silakan klik tombol di bawah ini untuk memverifikasi email kamu.')
            ->action('Verifikasi Sekarang', $verificationUrl)
            ->line('Jika kamu tidak merasa membuat akun ini, abaikan saja email ini.')
            ->salutation('Terima kasih, tim kami');
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }
}
