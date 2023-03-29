<?php

namespace App\Actions\Api\Private\User\ChangePassword;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Private\User\ChangePasswordResource;

class Handler
{
    public function handle(Request $request)
    {
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return new ChangePasswordResource($request);
    }
}
