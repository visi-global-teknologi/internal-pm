<?php

namespace App\Actions\Api\Private\MasterData\Employee\Division\Delete;

use Illuminate\Http\Request;
use App\Models\EmployeeDivision;

class LoggingUserActivity
{
    public static function handle(Request $request)
    {
        $employeeDivison = EmployeeDivision::where('id', $request->id)->delete();

        $request->request->add([
            'module_name' => 'master data - division',
            'activity' => 'delete division '.$employeeDivison->name,
        ]);
    }
}
