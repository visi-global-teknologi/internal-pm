<?php

namespace App\Actions\Api\Private\Employee\Delete;

use App\Models\Employee;
use Illuminate\Http\Request;

class LoggingUserActivity
{
    public static function handle(Request $request)
    {
        $employee = Employee::with(['user'])->where('id', $request->employee_id)->first();
        $request->request->add([
            'module_name' => 'employee',
            'activity' => 'delete employee '.$employee->name,
        ]);
    }
}
