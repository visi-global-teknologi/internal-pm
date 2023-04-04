<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Assigned;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Private\Acl\Role\Permission\AssignedResource;

class Handler
{
    public function handle(Request $request, $roleId, $permissionName)
    {
        $request->request->add([
            'role_id' => $roleId,
            'permission_name' => $permissionName
        ]);

        ValidateRequest::handle($request);
        AssignedPermission::handle($request);

        return new AssignedResource($request);
    }
}