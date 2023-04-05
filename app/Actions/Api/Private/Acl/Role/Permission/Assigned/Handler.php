<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Assigned;

use App\Http\Resources\Api\Private\Acl\Role\Permission\AssignedResource;
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
        AssignedPermission::handle($request);

        return new AssignedResource($request);
    }
}
