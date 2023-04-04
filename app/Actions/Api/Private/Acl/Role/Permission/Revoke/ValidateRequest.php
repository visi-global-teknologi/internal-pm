<?php

namespace App\Actions\Api\Private\Acl\Role\Permission\Revoke;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_name' => 'required|exists:permissions,name'
        ]);
    }
}
