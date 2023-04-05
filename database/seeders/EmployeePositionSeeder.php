<?php

namespace Database\Seeders;

use App\Models\EmployeeDivision;
use App\Models\EmployeePosition;
use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeePositions = [
            'software development' => [
                'cto',
                'web developer',
                'mobile developer',
                'qa',
                'project manager',
            ],
        ];
        foreach ($employeePositions as $key => $value) {
            $employeeDivision = EmployeeDivision::where('name', $key)->first();
            if ($employeeDivision) {
                foreach ($value as $keyV => $valueV) {
                    EmployeePosition::create([
                        'name' => $valueV,
                        'employee_division_id' => $employeeDivision->id,
                    ]);
                }
            }
        }
    }
}
