<?php

namespace App\Actions\Api\Private\User\ChangePassword;

use App\Http\Resources\Api\Private\User\ChangePasswordResource;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return new ChangePasswordResource($request);
    }
}
