<?php

namespace App\Actions\Api\Private\Employee\Store;

use App\Models\Country;
use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\IndonesiaVillage;
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
        $request->request->add([
            'password' => bcrypt('12345678'),
        ]);
        $user = User::create($request->only(['name', 'email', 'password']));
        $request->request->add([
            'user_id' => $user->id,
        ]);
    }

    public static function createEmployee($request)
    {
        $employee = Employee::create($request->only([
            'phone_number', 'personal_email', 'birthday',
            'join_date', 'employee_number', 'gender',
            'employee_level_id', 'employee_position_id', 'employee_supervisor_id',
            'user_id',
        ]));

        $request->request->add([
            'employee_id' => $employee->id,
        ]);
    }

    public static function createEmployeeAddress($request)
    {
        $address = (empty($request->other_address)) ? $request->indonesia_address : $request->other_address;
        $postalCode = (empty($request->other_postal_code)) ? $request->indonesia_postal_code : $request->other_postal_code;

        if (is_numeric($request->village_code)) {
            $country = Country::where('name', config('pm.country_indonesia'))->first();
            $countryId = $country->id;
            $village = IndonesiaVillage::where('code', $request->village_code)->first();
            $indonesiaVillageId = $village->id;
        } else {
            $countryId = null;
            $indonesiaVillageId = null;
        }

        $request->request->add([
            'address' => $address,
            'postal_code' => $postalCode,
            'country_id' => $countryId,
            'indonesia_village_id' => $indonesiaVillageId,
        ]);

        $request->validate([
            'address' => 'required',
            'postal_code' => 'required',
        ]);

        EmployeeAddress::create($request->only([
            'address',
            'postal_code',
            'country_id',
            'indonesia_village_id',
            'employee_id',
        ]));
    }

    public static function assignRoleToUser($request)
    {
        $user = User::find($request->user_id);
        $user->syncRoles([$request->role_name]);
    }
}
