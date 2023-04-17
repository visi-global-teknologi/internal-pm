<?php

namespace App\Actions\Api\Private\Acl\Role\Delete;

use App\Models\ModelHasRole;
use Illuminate\Http\Request;

class DeleteData
{
    public static function handle(Request $request)
    {
        $role = \Spatie\Permission\Models\Role::findById($request->role_id);
        $role->delete();

        ModelHasRole::where('role_id', $request->role_id);
    }
}
