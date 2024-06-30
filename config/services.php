<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '632161825701-p17n0kl8hp4rfnjs6nngrr6rthkui3mu.apps.googleusercontent.com',
        'client_secret' =>'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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],


    'email_service' => env('EMAIL_SERVICE', 'gmail'),

    'gmail' => [
        'username' => env('MAIL_USERNAME'),
        'password' => env('MAIL_PASSWORD'),
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_encryption' => 'tls',
    ],

    'mailtrap' => [
        'username' => env('MAILTRAP_USERNAME'),
        'password' => env('MAILTRAP_PASSWORD'),
        'smtp_host' => 'smtp.mailtrap.io',
        'smtp_port' => 2525,
        'smtp_encryption' => 'tls',
    ],

];
