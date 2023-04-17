<?php

namespace App\Actions\Api\Private\MasterData\Employee\Division\Store;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:employee_divisions,name',
            'active_status' => 'required|in:no,yes',
        ]);
    }
}
