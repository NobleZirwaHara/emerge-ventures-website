<?php

namespace App\Providers;

use App\Mail\PlunkTransport;
use Illuminate\Mail\MailManager;
use Illuminate\Support\ServiceProvider;

class PlunkMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->afterResolving(MailManager::class, function (MailManager $mailManager) {
            $mailManager->extend('plunk', function (array $config) {
                return new PlunkTransport(
                    $config['api_key'] ?? env('PLUNK_API_KEY'),
                    $config['api_url'] ?? env('PLUNK_API_URL', 'https://api.useplunk.com')
                );
            });
        });
    }
}
