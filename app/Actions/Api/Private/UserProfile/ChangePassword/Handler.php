<?php

namespace App\Actions\Api\Private\UserProfile\ChangePassword;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return response()->api(true, 200, [], 'Successfully changed password', '', '');
    }
}
