<?php

namespace App\Helpers;

use App\DataTransferObjects\EmployeeDto;
use App\Models\Country;
use App\Models\Employee;
use App\Models\IndonesiaVillage;

class EmployeeHelper
{
    public function getUrlPhotoByUserId($userId)
    {
        $employee = Employee::where('user_id', $userId)->first();
        $employeeDto = EmployeeDto::fromModel($employee);

        return $employeeDto->url_photo;
    }

    public function setIndonesiaAddress($address, $postalCode, $indonesiaVillageId)
    {
        $village = IndonesiaVillage::with(['indonesia_district.indonesia_city.indonesia_province'])->where('id', $indonesiaVillageId)->first();

        return $address.', '.$village->name.', '.$village->indonesia_district->name.', '.$village->indonesia_district->indonesia_city->name.', '.$village->indonesia_district->indonesia_city->indonesia_province->name.', '.$postalCode.', '.'Indonesia';
    }

    public function setOtherAddress($address, $postalCode, $countryId)
    {
        $country = Country::where('id', $countryId)->first();

        return $address.', '.$postalCode.', '.$country->name;
    }
}
