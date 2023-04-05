<?php

namespace Database\Seeders;

use App\Models\EmployeeDivision;
use Illuminate\Database\Seeder;

class EmployeeDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = ['infrastructure', 'software development', 'finance'];

        foreach ($divisions as $key => $value) {
            EmployeeDivision::create([
                'name' => $value,
            ]);
        }
    }
}
