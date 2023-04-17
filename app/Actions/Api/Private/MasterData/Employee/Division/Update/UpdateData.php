<?php

namespace App\Actions\Api\Private\MasterData\Employee\Division\Update;

use App\Models\EmployeeDivision;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        EmployeeDivision::where('id', $request->id)->update($request->only(['name', 'active_status']));
    }
}
