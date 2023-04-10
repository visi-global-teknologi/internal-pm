<?php

namespace App\Actions\Api\Private\Employee\Update\Profile;

use Illuminate\Http\Request;
use LVR\Phone\Phone;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'uuid' => 'required|exists:employees,uuid',
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