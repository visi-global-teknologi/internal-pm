<?php

namespace App\Actions\Api\Private\MasterData\EmployeeLevel\Delete;

use App\Http\Resources\Api\Private\MasterData\EmployeeLevel\DeleteResource;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        $request->request->add([
            'id' => $id,
        ]);

        ValidateRequest::handle($request);
        DeleteData::handle($request);

        return new DeleteResource($request);
    }
}
