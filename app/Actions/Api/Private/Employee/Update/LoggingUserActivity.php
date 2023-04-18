<?php

namespace App\Actions\Api\Private\Employee\Update;

use Illuminate\Http\Request;

class LoggingUserActivity
{
    public static function handle(Request $request)
    {
        $employeeId = $request->employee_id;
        $request->request->add([
            'module_name' => 'employee',
            'activity' => 'update employee with id '.$employeeId,
        ]);
    }
}
