<?php

namespace App\Actions\Api\Private\Acl\Role\Store;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SaveData
{
    public static function handle(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
    }
}
