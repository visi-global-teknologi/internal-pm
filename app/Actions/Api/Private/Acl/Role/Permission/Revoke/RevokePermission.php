<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Revoke;

use Illuminate\Http\Request;

class RevokePermission
{
    public static function handle(Request $request)
    {
        $role = \Spatie\Permission\Models\Role::where('id', $request->role_id)->first();
        $role->revokePermissionTo($request->permission_name);
    }
}
