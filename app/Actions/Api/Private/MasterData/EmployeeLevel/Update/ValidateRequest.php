<?php

namespace App\Actions\Api\Private\MasterData\EmployeeLevel\Update;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:employee_levels,name,'.$id.',id',
            'active_status' => 'required|in:no,yes',
        ]);
    }
}
