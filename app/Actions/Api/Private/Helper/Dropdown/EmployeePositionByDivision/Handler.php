<?php

namespace App\Actions\Api\Private\Helper\Dropdown\EmployeePositionByDivision;

use App\Models\EmployeePosition;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $employeeDivisionId)
    {
        $data = self::getData($employeeDivisionId);

        return response()->api(true, 200, $data, 'Successfully get data employee position', '', '');
    }

    public static function getData($employeeDivisionId)
    {
        $result = [];

        $employeePositions = EmployeePosition::where('employee_division_id', $employeeDivisionId)->pluck('name', 'id');
        if ($employeePositions->count() > 0) {
            $result = $employeePositions->toArray();
        }

        return $result;
    }
}
