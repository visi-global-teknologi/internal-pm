<?php

namespace App\DataTransferObjects;

use App\Models\Employee;
use Spatie\LaravelData\Data;

class EmployeeDto extends Data
{
    public function __construct(
        public int $id,
        public string $uuid,
        public string $name,
        public string $email,
        public ?string $personal_email,
        public string $join_date_formatted,
        public array $employee_supervisor,
    ) {

    }

    public static function fromModel(Employee $employee): self
    {
        return new self(
            $employee->id,
            $employee->uuid,
            $employee->name,
            $employee->email,
            $employee->personal_email,
            self::getJoinDateFormatted($employee),
            self::getEmployeeSupervisor($employee)
        );
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
