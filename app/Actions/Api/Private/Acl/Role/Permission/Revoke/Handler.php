<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Revoke;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $roleId, $permissionName)
    {
        $request->request->add([
            'role_id' => $roleId,
            'permission_name' => $permissionName,
        ]);

        ValidateRequest::handle($request);
        RevokePermission::handle($request);

        return response()->api(true, 200, [], 'Successfully revoke permission', '', '');
    }
}
