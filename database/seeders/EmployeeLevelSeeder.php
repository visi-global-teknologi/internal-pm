<?php

namespace Database\Seeders;

use App\Models\EmployeeLevel;
use Illuminate\Database\Seeder;

class EmployeeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 5; $i++) {
            EmployeeLevel::create([
                'name' => $i,
            ]);
        }
    }
}
