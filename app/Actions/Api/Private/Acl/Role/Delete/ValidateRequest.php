<?php

namespace App\Actions\Api\Private\Acl\Role\Delete;

use App\Models\User;
use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'user_uuid' => 'required|exists:users,uuid',
            'id' => 'required|exists:roles,id',
        ]);

        $user = User::where('uuid', $request->user_uuid)->first();
        $role = $user->getRoleNames()->first();

        if (!in_array($role, ['bod']))
            abort(400, 'You do not have access to this process');
    }
}
