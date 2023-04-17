<?php

namespace App\DataTransferObjects;

use App\Models\Employee;
use Spatie\LaravelData\Data;
use Storage;
use URL;

class EmployeeDto extends Data
{
    public function __construct(
        public int $id,
        public string $uuid,
        public ?string $personal_email,
        public ?string $birthday_formatted,
        public ?string $birthday_ymd_formatted,
        public ?string $join_date_formatted,
        public string $url_photo,
        public array $supervisor,
        public array $addresses
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
            self::getEmployeeSupervisor($employee),
            self::getAddresses($employee)
        );
    }

    public static function getBirthdayFormatted($employee)
    {
        return (! empty($employee->birthday)) ?
            $employee->birthday->toFormattedDateString() :
            null;
    }

    public static function getBirthdayYmdFormatted($employee)
    {
        return (! empty($employee->birthday)) ?
            $employee->birthday->format('Y-m-d') :
            null;
    }

    public static function getJoinDateFormatted($employee)
    {
        return (! empty($employee->join_date)) ?
            $employee->join_date->toFormattedDateString() :
            null;
    }

    public static function getUrlPhoto($employee)
    {
        return (! empty($employee->photo)) ?
            Storage::disk('employee-photo')->url($employee->photo) :
            URL::asset('/build/images/users/avatar-1.jpg');
    }

    public static function getEmployeeSupervisor($employee)
    {
        $result = [];

        if (is_int($employee->employee_supervisor_id)) {
            $supervisor = Employee::with(['user'])->where('id', $employee->employee_supervisor_id)->first();
            if ($supervisor) {
                $result = $supervisor->toArray();
            }
        }

        return $result;
    }

    public static function getAddresses($employee)
    {
        $result = [];
        $addresses = $employee->employee_addresses;

        if ($addresses->count() > 0) {
            foreach ($addresses as $key => $value) {
                if (is_numeric($value->indonesia_village_id)) {
                    $result[$key] = app('employee.helper')->setIndonesiaAddress($value->address, $value->postal_code, $value->indonesia_village_id);
                } else {
                    $result[$key] = app('employee.helper')->setOtherAddress($value->address, $value->postal_code, $value->country_id);
                }
            }
        }

        return $result;
    }
}
