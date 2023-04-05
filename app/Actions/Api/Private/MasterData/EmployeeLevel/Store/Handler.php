<?php

namespace App\Actions\Api\Private\MasterData\EmployeeLevel\Store;

use App\Http\Resources\Api\Private\MasterData\EmployeeLevel\StoreResource;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return new StoreResource($request);
    }
}
