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

        // employee

        $this->app->bind(
            'app.action.api.private.employee.update',
            \App\Actions\Api\Private\Employee\Update\Handler::class
        );

        // datatable

        $this->app->bind(
            'app.action.api.private.datatable.role',
            \App\Actions\Api\Private\Datatable\Role\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.permission',
            \App\Actions\Api\Private\Datatable\Permission\Handler::class
        );

        // acl

        $this->app->bind(
            'app.action.api.private.acl.role.delete',
            \App\Actions\Api\Private\Acl\Role\Delete\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.acl.role.permission.revoke',
            \App\Actions\Api\Private\Acl\Role\Permission\Revoke\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.acl.role.permission.assigned',
            \App\Actions\Api\Private\Acl\Role\Permission\Assigned\Handler::class
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
