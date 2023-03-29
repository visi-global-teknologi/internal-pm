<?php

namespace App\Actions\Api\Private\User\ChangePassword;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirmation_new_password' => 'required|min:8',
            'user_id' => 'required|exists:users,id'
        ]);

        self::checkOldPassword($request);
    }

    public static function checkOldPassword($request)
    {
        $userOldPassword = User::where('id', $request->user_id)->first()->password;

        if (!Hash::check($request->old_password, $userOldPassword))
            throw new \Exception("Old password doesnt matched");
    }
}
