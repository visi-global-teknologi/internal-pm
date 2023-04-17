<?php

namespace App\Actions\Api\Private\Employee\Update;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        $request->request->add([
            'employee_id' => $id,
        ]);
        ValidateRequest::handle($request);
        SaveData::handle($request);

        return response()->api(true, 200, [], 'Successfully update employee', '', '');
    }
}
