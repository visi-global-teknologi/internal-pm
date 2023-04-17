<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Delete;

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

        return response()->api(true, 200, [], 'Successfully delete employee level', '', '');
    }
}
