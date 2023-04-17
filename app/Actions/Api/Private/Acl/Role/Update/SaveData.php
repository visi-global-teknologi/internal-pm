<?php

namespace App\Actions\Api\Private\Acl\Role\Update;

use App\Models\Role;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        Role::where('id', $request->role_id)->update($request->only(['name']));
    }
}
