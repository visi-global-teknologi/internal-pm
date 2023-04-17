<?php

namespace App\Actions\Api\Private\Employee\Store;

use Illuminate\Http\Request;
use LVR\Phone\Phone;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'phone_number' => [
                'required',
                new Phone,
            ],
            'email' => 'required|unique:users,email',
            'personal_email' => 'nullable|email|unique:employees,personal_email',
            'gender' => 'required|in:male,female',
            'employee_number' => 'required|unique:employees,employee_number',
            'birthday' => 'required|date',
            'join_date' => 'required|date',
            'employee_level_id' => 'required|exists:employee_levels,id',
            'employee_position_id' => 'required|exists:employee_positions,id',
            'employee_supervisor_id' => 'nullable|exists:employees,id',
            'role_name' => 'required|exists:roles,name',
            'country_id' => 'required|exists:countries,id',
            'indonesia_village_id' => 'nullable|exists:indonesia_villages,id',
            'other_postal_code' => 'nullable',
            'indonesia_postal_code' => 'nullable',
            'other_address' => 'nullable',
            'indonesia_address' => 'nullable',
        ]);
    }
}
