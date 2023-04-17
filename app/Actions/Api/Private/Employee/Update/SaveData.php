<?php

namespace App\Actions\Api\Private\Employee\Update;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\User;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        self::createUser($request);
        self::createEmployee($request);
        self::createEmployeeAddress($request);
        self::assignRoleToUser($request);
    }

    public static function createUser($request)
    {
        User::where('id', $request->user_id)->update($request->only(['name', 'email']));
    }

    public static function createEmployee($request)
    {
        Employee::where('id', $request->employee_id)->update($request->only([
            'phone_number', 'personal_email', 'birthday',
            'join_date', 'employee_number', 'gender',
            'employee_level_id', 'employee_position_id', 'employee_supervisor_id',
        ]));
    }

    public static function createEmployeeAddress($request)
    {
        EmployeeAddress::where('employee_id', $request->employee_id)->update($request->only([
            'address',
            'postal_code',
            'country_id',
            'indonesia_village_id',
        ]));
    }

    public static function assignRoleToUser($request)
    {
        $user = User::find($request->user_id);
        $user->syncRoles([$request->role_name]);
    }
}
