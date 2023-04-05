<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        $bod = User::create([
            'name' => 'sapta aji',
            'email' => 'sapta.aji@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);
        $bod->assignRole(config('pm.roles.bod'));

        // employee
        $employee = User::create([
            'name' => 'koesindarto widiokarmo',
            'email' => 'tyo.widiokarmo@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);
        $employee->assignRole(config('pm.roles.employee'));
    }
}
