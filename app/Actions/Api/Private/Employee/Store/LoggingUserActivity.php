<?php

namespace App\Actions\Api\Private\Employee\Store;

use Illuminate\Http\Request;

class LoggingUserActivity
{
    public static function handle(Request $request)
    {
        $request->request->add([
            'module_name' => 'employee',
            'activity' => 'create employee '.$request->name,
        ]);
    }
}
