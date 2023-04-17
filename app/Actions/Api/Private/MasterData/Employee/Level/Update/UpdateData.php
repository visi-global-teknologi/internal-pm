<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Update;

use App\Models\EmployeeLevel;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        EmployeeLevel::where('id', $request->id)->update($request->only(['name', 'active_status']));
    }
}
