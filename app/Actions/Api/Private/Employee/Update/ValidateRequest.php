<?php

namespace App\Actions\Api\Private\Employee\Update;

use App\Models\Employee;
use Illuminate\Http\Request;
use LVR\Phone\Phone;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $employeeId = $request->employee_id;
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'name' => 'required|min:2',
            'phone_number' => [
                'required',
                new Phone,
                'unique:employees,phone_number,'.$employeeId,
            ],
            'personal_email' => [
                'nullable',
                'email',
                'unique:employees,personal_email,'.$employeeId,
            ],
            'gender' => 'required|in:male,female',
            'employee_number' => [
                'required',
                'unique:employees,employee_number,'.$employeeId,
            ],
            'birthday' => 'required|date',
            'join_date' => 'required|date',
            'employee_level_id' => 'required|exists:employee_levels,id',
            'employee_position_id' => 'required|exists:employee_positions,id',
            'employee_supervisor_id' => 'nullable|exists:employees,id',
            'role_name' => 'required|exists:roles,name',
            'country_id' => 'required|exists:countries,id',
            'indonesia_village_id' => 'nullable|exists:indonesia_villages,id',
            'postal_code' => 'required',
            'address' => 'required',
        ]);

        $user = Employee::where('id', $employeeId)->first();
        $request->request->add([
            'user_id' => $user->id,
        ]);
        $request->validate([
            'email' => [
                'required',
                'email',
                'unique:users,email,'.$user->id,
            ],
        ]);
    }
}
