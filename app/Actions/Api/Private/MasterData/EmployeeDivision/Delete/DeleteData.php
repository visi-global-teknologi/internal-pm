<?php

namespace App\Actions\Api\Private\MasterData\EmployeeDivision\Delete;

use App\Models\EmployeeDivision;
use App\Models\EmployeePosition;
use Illuminate\Http\Request;

class DeleteData
{
    public static function handle(Request $request)
    {
        $employeePosition = EmployeePosition::where('employee_division_id', $request->id)->first();

        if ($employeePosition)
            abort(400, 'There is employee position data related to this level of data');

        EmployeeDivision::where('id', $request->id)->delete();
    }
}
