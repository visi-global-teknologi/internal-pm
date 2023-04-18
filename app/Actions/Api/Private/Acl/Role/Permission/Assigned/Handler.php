<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Assigned;

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
        LoggingUserActivity::handle($request);

        return response()->api(true, 200, [], 'Successfully assigned permission', '', '');
    }
}
