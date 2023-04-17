<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Store;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:employee_levels,name',
            'active_status' => 'required|in:no,yes',
        ]);
    }
}
