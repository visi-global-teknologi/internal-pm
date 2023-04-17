<?php

namespace App\Actions\Api\Private\Acl\Role\Delete;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        $request->request->add([
            'role_id' => $id,
        ]);
        ValidateRequest::handle($request);
        DeleteData::handle($request);

        return response()->api(true, 200, [], 'Successfully delete role', '', '');
    }
}
