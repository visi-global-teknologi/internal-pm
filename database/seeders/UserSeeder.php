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
        $projectManager = User::create([
            'name' => 'koesindarto widiokarmo',
            'email' => 'tyo.widiokarmo@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now()
        ]);
        $projectManager->assignRole('project manager');
    }
}
