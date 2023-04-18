<?php

namespace App\Actions\Api\Private\Acl\Role\Store;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request)
    {
        ValidateRequest::handle($request);
        SaveData::handle($request);
        LoggingUserActivity::handle($request);

        return response()->api(true, 200, [], 'Successfully store role', '', '');
    }
}
