<?php

namespace App\Actions\Api\Private\MasterData\EmployeeLevel\Store;

use App\Models\EmployeeLevel;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        EmployeeLevel::create($request->only(['name', 'active_status']));
    }
}
