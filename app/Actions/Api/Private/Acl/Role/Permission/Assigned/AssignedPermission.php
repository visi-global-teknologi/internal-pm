<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Assigned;

use Illuminate\Http\Request;

class AssignedPermission
{
    public static function handle(Request $request)
    {
        $role = \Spatie\Permission\Models\Role::where('id', $request->role_id)->first();
        $permission = \Spatie\Permission\Models\Permission::findByName($request->permission_name);
        $role->givePermissionTo($permission);
    }
}
