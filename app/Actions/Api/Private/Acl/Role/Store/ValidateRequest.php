<?php

namespace App\Actions\Api\Private\Acl\Role\Store;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
    }
}
