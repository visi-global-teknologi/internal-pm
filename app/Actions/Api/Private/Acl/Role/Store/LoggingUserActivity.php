<?php

namespace App\Actions\Api\Private\Acl\Role\Store;

use Illuminate\Http\Request;

class LoggingUserActivity
{
    public static function handle(Request $request)
    {
        $request->request->add([
            'module_name' => 'acl',
            'activity' => 'create role '.$request->name,
        ]);
    }
}
