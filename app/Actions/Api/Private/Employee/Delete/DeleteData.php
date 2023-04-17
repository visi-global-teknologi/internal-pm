<?php

namespace App\Actions\Api\Private\Employee\Delete;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteData
{
    public static function handle(Request $request)
    {
        $employee = Employee::where('id', $request->employee_id)->first();
        Employee::where('id', $request->employee_id)->delete();
        User::where('id', $employee->user_id)->delete();
    }
}
