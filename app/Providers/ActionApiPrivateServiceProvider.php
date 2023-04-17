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
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // employee

        $this->app->bind(
            'app.action.api.private.employee.store',
            \App\Actions\Api\Private\Employee\Store\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.employee.update',
            \App\Actions\Api\Private\Employee\Update\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.employee.delete',
            \App\Actions\Api\Private\Employee\Delete\Handler::class
        );

        // user - profile

        $this->app->bind(
            'app.action.api.private.user-profile.update',
            \App\Actions\Api\Private\UserProfile\Update\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.user-profile.change-password',
            \App\Actions\Api\Private\UserProfile\ChangePassword\Handler::class
        );

        // helper - dropdown

        $this->app->bind(
            'app.action.api.private.helper.dropdown.employee-position-by-division',
            \App\Actions\Api\Private\Helper\Dropdown\EmployeePositionByDivision\Handler::class
        );

        // helper - select2

        $this->app->bind(
            'app.action.api.private.helper.selecttwo.user',
            \App\Actions\Api\Private\Helper\SelectTwo\User\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.helper.selecttwo.country-without-indonesia',
            \App\Actions\Api\Private\Helper\SelectTwo\CountryWithoutIndonesia\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.helper.selecttwo.province',
            \App\Actions\Api\Private\Helper\SelectTwo\Province\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.helper.selecttwo.city-by-province',
            \App\Actions\Api\Private\Helper\SelectTwo\CityByProvince\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.helper.selecttwo.district-by-city',
            \App\Actions\Api\Private\Helper\SelectTwo\DistrictByCity\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.helper.selecttwo.village-by-district',
            \App\Actions\Api\Private\Helper\SelectTwo\VillageByDistrict\Handler::class
        );

        // acl

        $this->app->bind(
            'app.action.api.private.acl.role.store',
            \App\Actions\Api\Private\Acl\Role\Store\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.acl.role.delete',
            \App\Actions\Api\Private\Acl\Role\Delete\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.acl.role.update',
            \App\Actions\Api\Private\Acl\Role\Update\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.acl.role.permission.revoke',
            \App\Actions\Api\Private\Acl\Role\Permission\Revoke\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.acl.role.permission.assigned',
            \App\Actions\Api\Private\Acl\Role\Permission\Assigned\Handler::class
        );

        // master data - employee - level

        $this->app->bind(
            'app.action.api.private.master-data.employee.level.store',
            \App\Actions\Api\Private\MasterData\Employee\Level\Store\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.master-data.employee.level.update',
            \App\Actions\Api\Private\MasterData\Employee\Level\Update\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.master-data.employee.level.delete',
            \App\Actions\Api\Private\MasterData\Employee\Level\Delete\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.master-data.employee.division.store',
            \App\Actions\Api\Private\MasterData\Employee\Division\Store\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.master-data.employee.division.update',
            \App\Actions\Api\Private\MasterData\Employee\Division\Update\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.master-data.employee.division.delete',
            \App\Actions\Api\Private\MasterData\Employee\Division\Delete\Handler::class
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

        $this->app->bind(
            'app.action.api.private.datatable.master-data.employee.division',
            \App\Actions\Api\Private\Datatable\MasterData\Employee\Division\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.master-data.employee.level',
            \App\Actions\Api\Private\Datatable\MasterData\Employee\Level\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.employee',
            \App\Actions\Api\Private\Datatable\Employee\Handler::class
        );

        $this->app->bind(
            'app.action.api.private.datatable.user-activity',
            \App\Actions\Api\Private\Datatable\UserActivity\Handler::class
        );
    }
}
