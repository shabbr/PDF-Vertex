<?php

// app/Services/GmailService.php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class GmailService implements EmailServiceInterface
{
    public function send($to, $subject, $body)
    {
        config([
            'mail.mailers.smtp.host' => 'smtp.gmail.com',
            'mail.mailers.smtp.port' => 587,
            'mail.mailers.smtp.encryption' => 'tls',
            'mail.mailers.smtp.username' => env('MAIL_USERNAME'),
            'mail.mailers.smtp.password' => env('MAIL_PASSWORD'),
        ]);

        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)
                    ->subject($subject);
        });
    }
}

?>
