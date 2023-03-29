<?php

namespace App\Actions\Api\Private\User\ChangePassword;

use App\Models\User;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        $user = User::where('id', $request->user_id)->firstOrFail();
        $user->password = bcrypt($request->new_password);
        $user->save();
    }
}
