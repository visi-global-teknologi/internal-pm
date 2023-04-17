<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = countries();

        foreach ($countries as $key => $value) {
            Country::create([
                'name' => $value['name'],
            ]);
        }
    }
}
