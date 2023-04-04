<?php

namespace App\Actions\Api\Private\Datatable\Permission;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $arr = [];
        $routes = Route::getRoutes();
        $routesByName = $routes->getRoutesByName();
        $role = Role::findByName($request->role_name);
        $rolePermissions = $role->permissions->toArray();

        if (count($routesByName) > 0) {
            foreach ($routesByName as $key => $value) {
                $actions = $value->action;
                $prefix = $value->action['prefix'];
                $methods = $value->methods;

                if (true == self::checkSkippedPrefix($prefix))
                    continue;
                if (true == self::checkSkippedKey($key))
                    continue;

                $arr[] = [
                    'key' => $key,
                    'prefix' => $prefix,
                    'controller' => (array_key_exists('controller', $actions)) ? $actions['controller'] : '',
                    'method' => $methods[0],
                    'assigned' => self::checkRoleAssignedPermission($role->id, $rolePermissions, $key)
                ];
            }
        }

        $collection = collect($arr);
        return DataTables::collection($collection)->rawColumns(['assigned'])->toJson();
    }

    public static function checkSkippedPrefix($prefix)
    {
        $skipped = [
            '_ignition',
            'log-viewer/api',
            'sanctum'
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
            'login'
        ];

        foreach ($skipped as $value) {
            if (str_contains($key, $value)) {
                $isSkipped = true;
                break;
            }
        }

        return $isSkipped;
    }

    public static function checkRoleAssignedPermission($roleId, $rolePermissions, $key)
    {
        $result = array_filter($rolePermissions, function($rolePermission) use ($key) {
            return $rolePermission['name'] == $key;
        });

        $checked = (!empty($result)) ? true : false;
        $url = (true == $checked) ?
                route('api.private.acl.role.revoke', ['id' => $roleId, 'permissionName' => $key]) :
                route('api.private.acl.role.assigned', ['id' => $roleId, 'permissionName' => $key]) ;

    return view('skote.pages.acl.role.datatable.permission.assigned-revoke', compact('checked', 'url', 'key'))->render();
    }
}
