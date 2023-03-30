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

        $this->app->bind(
            'app.action.api.private.employee.update',
            \App\Actions\Api\Private\Employee\Update\Handler::class
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
