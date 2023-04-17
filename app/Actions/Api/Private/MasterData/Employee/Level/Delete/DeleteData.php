<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Delete;

use App\Models\Employee;
use App\Models\EmployeeLevel;
use Illuminate\Http\Request;

class DeleteData
{
    public static function handle(Request $request)
    {
        $employee = Employee::where('employee_level_id', $request->id)->first();

        if ($employee)
            abort(400, 'There is employee data related to this level of data');

        EmployeeLevel::where('id', $request->id)->delete();
    }
}
