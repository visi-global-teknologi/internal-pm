<?php

namespace App\DataTransferObjects;

use URL;
use Storage;
use App\Models\Employee;
use Spatie\LaravelData\Data;

class EmployeeDto extends Data
{
    public function __construct(
        public int $id,
        public string $uuid,
        public ?string $personal_email,
        public string $birthday_formatted,
        public string $birthday_ymd_formatted,
        public string $join_date_formatted,
        public string $url_photo,
        public array $employee_supervisor
    ) {

    }

    public static function fromModel(Employee $employee): self
    {
        return new self(
            $employee->id,
            $employee->uuid,
            $employee->personal_email,
            self::getBirthdayFormatted($employee),
            self::getBirthdayYmdFormatted($employee),
            self::getJoinDateFormatted($employee),
            self::getUrlPhoto($employee),
            self::getEmployeeSupervisor($employee)
        );
    }

    public static function getBirthdayFormatted($employee)
    {
        $result = '-';

        if (!empty($employee->birthday)) {
            $result = $employee->birthday->toFormattedDateString();
        }

        return $result;
    }

    public static function getBirthdayYmdFormatted($employee)
    {
        $result = '-';

        if (!empty($employee->birthday)) {
            $result = $employee->birthday->format('Y-m-d');
        }

        return $result;
    }

    public static function getJoinDateFormatted($employee)
    {
        $result = '-';

        if (!empty($employee->join_date)) {
            $result = $employee->join_date->toFormattedDateString();
        }

        return $result;
    }

    public static function getUrlPhoto($employee)
    {
        $result = URL::asset('/build/images/users/avatar-1.jpg');
        if (!empty($employee->photo)) {
            $result = Storage::disk('employee-photo')->url($employee->photo);
        }

        return $result;
    }

    public static function getEmployeeSupervisor($employee)
    {
        $result = [];

        if (is_int($employee->employee_supervisor_id)) {
            $supervisor = Employee::where('id', $employee->employee_supervisor_id)->first();
            if ($supervisor) {
                $result = $supervisor->toArray();
            }
        }

        return $result;
    }
}
