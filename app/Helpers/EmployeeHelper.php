<?php

namespace App\Helpers;

use App\Models\Employee;
use Storage;
use URL;

class EmployeeHelper
{
    public function getUrlPhotoByUserId($userId)
    {
        $result = URL::asset('/build/images/users/avatar-1.jpg');
        $employee = Employee::where('user_id', $userId)->first();

        if ($employee) {
            if (! empty($employee->photo)) {
                $result = Storage::disk('employee-photo')->url($employee->photo);
            }
        }

        return $result;
    }
}
