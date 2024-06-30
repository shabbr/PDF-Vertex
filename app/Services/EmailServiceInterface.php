<?php

namespace App\Services;


interface EmailServiceInterface
{
    public function send($to, $subject, $body);
}
