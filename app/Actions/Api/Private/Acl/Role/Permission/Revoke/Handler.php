<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Revoke;

use App\Http\Resources\Api\Private\Acl\Role\Permission\RevokeResource;
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

        return new RevokeResource($request);
    }
}
