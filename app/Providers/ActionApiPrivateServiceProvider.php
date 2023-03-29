<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActionApiPrivateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // user

        $this->app->bind(
            'app.action.api.private.user.change-password',
            \App\Actions\Api\Private\User\ChangePassword\Handler::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
