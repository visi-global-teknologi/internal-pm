<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeLevel;
use App\Models\EmployeePosition;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'birthday' => '1986-06-18',
            'employee_number' => rand(1, 30),
            'gender' => 'male',
            'active_status' => 'yes',
            'employee_level_id' => EmployeeLevel::where('name', 2)->first()->id,
            'employee_position_id' => EmployeePosition::where('name', 'project manager')->first()->id,
            'user_id' => User::where('name', 'koesindarto widiokarmo')->first()->id,
        ]);

        Employee::create([
            'birthday' => '1990-07-08',
            'employee_number' => 3,
            'gender' => 'male',
            'active_status' => 'yes',
            'employee_level_id' => EmployeeLevel::where('name', 1)->first()->id,
            'employee_position_id' => EmployeePosition::where('name', 'cto')->first()->id,
            'user_id' => User::where('name', 'sapta aji')->first()->id,
        ]);
    }
}
