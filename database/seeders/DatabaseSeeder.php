<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('db:seed', ['--class' => 'Laravolt\Indonesia\Seeds\DatabaseSeeder', '--force' => true]);
        $this->call(CountrySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployeeLevelSeeder::class);
        $this->call(EmployeeDivisionSeeder::class);
        $this->call(EmployeePositionSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
