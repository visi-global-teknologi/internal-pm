<?php

namespace App\Actions\Api\Private\Datatable\Permission;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = Permission::query();
        $role = Role::findByName($request->role_name);
        $rolePermissions = $role->permissions->toArray();

        return DataTables::of($query)
        ->addColumn('assigned', function($row) use ($role, $rolePermissions) {
            return self::checkRoleAssignedPermission($role->id, $rolePermissions, $row->name);
        })
        ->rawColumns(['assigned'])
        ->toJson();
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
