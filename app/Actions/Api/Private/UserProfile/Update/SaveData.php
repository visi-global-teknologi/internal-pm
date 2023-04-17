<?php

namespace App\Actions\Api\Private\UserProfile\Update;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Storage;

class SaveData
{
    public static function handle(Request $request)
    {
        self::userData($request);
        self::employeeData($request);
        self::employeePhoto($request);
    }

    public static function userData($request)
    {
        User::where('id', $request->user_id)->update($request->only(['name']));
    }

    public static function employeeData($request)
    {
        Employee::where('user_id', $request->user_id)->update($request->only(['personal_email', 'phone_number', 'gender', 'birthday']));
    }

    public static function employeePhoto($request)
    {
        if ($request->has('photo')) {
            $photo = $request->file('photo');
            $photoName = uniqid().'-employee-photo'.'.'.$photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('employee/photo', $photo, $photoName);
            Employee::where('user_id', $request->user_id)->update([
                'photo' => $photoName,
            ]);
        }
    }
}
