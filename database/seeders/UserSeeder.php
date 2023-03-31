<?php

namespace Database\Seeders;

use Str;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // super admin
        $superAdmin = User::create([
            'name' => 'super admin',
            'email' => 'superadmin@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $superAdmin->assignRole(config('pm.roles.super-admin'));

        // employee
        $employee = User::create([
            'name' => 'koesindarto widiokarmo',
            'email' => 'tyo.widiokarmo@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $employee->assignRole(config('pm.roles.employee'));
    }
}
