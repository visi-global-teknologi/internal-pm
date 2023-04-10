<?php

namespace App\Helpers;

use URL;
use Storage;
use App\Models\Employee;

class EmployeeHelper
{
    public function getUrlPhotoByUserId($userId)
    {
        $result = URL::asset('/build/images/users/avatar-1.jpg');
        $employee = Employee::where('user_id', $userId)->first();

        if ($employee) {
            $result = Storage::disk('employee-photo')->url($employee->photo);
        }

        return $result;
    }
}
