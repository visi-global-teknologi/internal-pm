<?php

namespace App\Actions\Api\Private\Acl\Role\Delete;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Private\Acl\Role\DeleteResource;

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
