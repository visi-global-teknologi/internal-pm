<?php

namespace App\Actions\Api\Private\MasterData\Employee\Level\Update;

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

        return response()->api(true, 200, [], 'Successfully update employee level', '', '');
    }
}
