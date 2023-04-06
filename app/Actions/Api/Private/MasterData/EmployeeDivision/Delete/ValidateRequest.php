<?php

namespace App\Actions\Api\Private\MasterData\EmployeeDivision\Delete;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:employee_divisions,id',
        ]);
    }
}
