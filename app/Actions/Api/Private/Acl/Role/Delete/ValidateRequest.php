<?php

namespace App\Actions\Api\Private\Acl\Role\Delete;

use App\Models\Role;
use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        self::checkUninterruptibleRoles($request);
    }

    public static function checkUninterruptibleRoles($request)
    {
        $uninterruptibleRoles = config('pm.uninterruptible_roles');
        $role = Role::where('id', $request->role_id)->first();

        if (in_array($role->name, $uninterruptibleRoles))
            abort(400, $role->name.' is an uninterruptible role');
    }
}
