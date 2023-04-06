<?php

namespace App\Actions\Api\Private\MasterData\EmployeeLevel\Update;

use App\Http\Resources\Api\Private\MasterData\EmployeeLevel\UpdateResource;
use Illuminate\Http\Request;

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
