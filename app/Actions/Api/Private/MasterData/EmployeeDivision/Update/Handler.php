<?php

namespace App\Actions\Api\Private\MasterData\EmployeeDivision\Update;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Private\MasterData\EmployeeDivision\UpdateResource;

class Handler
{
    public function handle(Request $request, $id)
    {
        $request->request->add([
            'id' => $id,
        ]);
        ValidateRequest::handle($request);
        UpdateData::handle($request);

        return new UpdateResource($request);
    }
}
