<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Store;

use App\Models\EmployeeLevel;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        EmployeeLevel::create($request->only(['name', 'active_status']));
    }
}
