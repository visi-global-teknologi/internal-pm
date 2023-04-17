<?php

namespace App\Actions\Api\Private\MasterData\Employee\Division\Update;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|unique:employee_divisions,name,'.$id.',id',
            'active_status' => 'required|in:no,yes',
        ]);
    }
}
