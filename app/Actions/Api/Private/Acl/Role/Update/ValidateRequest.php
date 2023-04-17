<?php

namespace App\Actions\Api\Private\Acl\Role\Update;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $roleId = $request->role_id;
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|unique:roles,name,'.$roleId,
        ]);
    }
}
