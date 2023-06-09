<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Delete;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:employee_levels,id',
        ]);
    }
}
