<?php

namespace App\Actions\Api\Private\MasterData\EmployeeDivision\Store;

use App\Models\EmployeeDivision;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        EmployeeDivision::create($request->only(['name', 'active_status']));
    }
}
