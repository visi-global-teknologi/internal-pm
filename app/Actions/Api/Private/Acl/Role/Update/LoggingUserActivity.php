<?php

namespace App\Actions\Api\Private\Acl\Role\Update;

use App\Models\Role;
use Illuminate\Http\Request;

class LoggingUserActivity
{
    public static function handle(Request $request)
    {
        $role = Role::where('id', $request->role_id)->first();

        $request->request->add([
            'module_name' => 'acl',
            'activity' => 'update role '.$role->name.' to '.$request->name,
        ]);
    }
}
