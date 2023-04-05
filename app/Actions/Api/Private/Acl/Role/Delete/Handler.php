<?php

namespace App\Actions\Api\Private\Acl\Role\Delete;

use App\Http\Resources\Api\Private\Acl\Role\DeleteResource;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        ValidateRequest::handle($request);
        DeleteData::handle($request);

        return new DeleteResource($request);
    }
}
