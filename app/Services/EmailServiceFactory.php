<?php
namespace App\Services;

class EmailServiceFactory{
    public static function make($service)
    {
        switch ($service) {
            case 'gmail':
                return new GmailService();
            case 'mailtrap':
                return new MailtrapService();
            default:
                throw new \Exception('Invalid email service');
        }
    }
}

?>
