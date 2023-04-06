<?php

namespace App\Actions\Api\Private\MasterData\EmployeeDivision\Delete;

use App\Http\Resources\Api\Private\MasterData\EmployeeDivision\DeleteResource;
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
