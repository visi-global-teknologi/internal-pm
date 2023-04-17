<?php

namespace App\Actions\Api\Private\UserProfile\Update;

use Illuminate\Http\Request;
use LVR\Phone\Phone;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $userId = $request->user_id;
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'personal_email' => 'required|email',
            'gender' => 'required|in:male,female',
            'phone_number' => [
                'required',
                new Phone,
            ],
            'birthday' => 'required|date_format:Y-m-d',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:512',
        ]);
    }
}
