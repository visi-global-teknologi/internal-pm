<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = Route::getRoutes();
        $routesByName = $routes->getRoutesByName();

        if (count($routesByName) > 0) {
            foreach ($routesByName as $key => $value) {
                $actions = $value->action;
                $prefix = $value->action['prefix'];
                $methods = $value->methods;

                if (true == self::checkSkippedPrefix($prefix))
                    continue;
                if (true == self::checkSkippedKey($key))
                    continue;

                \Spatie\Permission\Models\Permission::create(['name' => $key]);
            }
        }
    }

    public static function checkSkippedPrefix($prefix)
    {
        $skipped = [
            '_ignition',
            'log-viewer/api',
            'sanctum',
        ];

        return in_array($prefix, $skipped);
    }

    public static function checkSkippedKey($key)
    {
        $isSkipped = false;
        $skipped = [
            'api.private',
            'home',
            'logout',
            'password.',
            'profile',
            'login',
        ];

        foreach ($skipped as $value) {
            if (str_contains($key, $value)) {
                $isSkipped = true;
                break;
            }
        }

        return $isSkipped;
    }
}
