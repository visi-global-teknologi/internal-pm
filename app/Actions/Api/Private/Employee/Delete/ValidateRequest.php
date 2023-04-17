<?php

namespace App\Actions\Api\Private\Employee\Delete;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);
    }
}
