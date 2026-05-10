<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class RestablecerContrasena extends ResetPassword
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Restablece tu contraseña — GeN Trading')
            ->view('emails.restablecer', ['url' => $url]);
    }

    public function sendPasswordResetNotification($token)
    {
        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->email,
        ], false));

        $this->notify(new \App\Notifications\RestablecerContrasena($token));
    }
}