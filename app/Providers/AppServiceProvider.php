<?php

namespace App\Providers;

use App\Mail\MailtrapMail;
use App\Services\EmailServiceInterface;
use App\Services\GmailService;
use App\Services\MailtrapService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(EmailServiceInterface::class, function ($app) {
            $service = config('services.email_service');
            // dd($service);
            switch ($service) {
                case 'gmail':

                    return new GmailService();
                case 'mailtrap':
                    return new MailtrapService();
                default:
                    throw new \Exception('No valid email service configured');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
