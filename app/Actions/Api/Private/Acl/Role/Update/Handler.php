<?php

namespace App\Actions\Api\Private\Acl\Role\Update;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        $request->request->add([
            'role_id' => $id,
        ]);
        ValidateRequest::handle($request);
        SaveData::handle($request);
        LoggingUserActivity::handle($request);

        return response()->api(true, 200, [], 'Successfully update role', '', '');
    }
}
