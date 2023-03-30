<?php

namespace App\Actions\Api\Private\Employee\Update;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Private\Employee\UpdateResource;

class Handler
{
    public function handle(Request $request, $uuid)
    {
        $request->request->add([
            'uuid' => $uuid
        ]);
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return new UpdateResource($request);
    }
}
