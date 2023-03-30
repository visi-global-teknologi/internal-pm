<?php

namespace App\DataTransferObjects;

use App\Models\Employee;
use Spatie\LaravelData\Data;

class EmployeeDto extends Data
{
    public function __construct(
        public int $id,
        public string $uuid,
        public ?string $personal_email,
        public string $birthday_formatted,
        public string $join_date_formatted,
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
            self::getJoinDateFormatted($employee),
            self::getEmployeeSupervisor($employee)
        );
    }

    public static function getBirthdayFormatted($employee)
    {
        $result = '-';

        if (!is_null($employee->birthday)) {
            $result = $employee->birthday->toFormattedDateString();
        }

        return $result;
    }

    public static function getJoinDateFormatted($employee)
    {
        $result = '-';

        if (!is_null($employee->join_date)) {
            $result = $employee->join_date->toFormattedDateString();
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
