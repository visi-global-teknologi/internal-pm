<?php

namespace App\Actions\Api\Private\MasterData\Employee\Division\Store;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return response()->api(true, 200, [], 'Successfully create employee division', '', '');
    }
}
