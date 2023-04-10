<?php

namespace App\Actions\Api\Private\Employee\Update\Profile;

use App\Http\Resources\Api\Private\Employee\UpdateResource;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $uuid)
    {
        $request->request->add([
            'uuid' => $uuid,
        ]);
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return new UpdateResource($request);
    }
}
