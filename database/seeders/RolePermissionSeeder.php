<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = \Spatie\Permission\Models\Role::where('name', 'bod')->first();
        $permissions = \Spatie\Permission\Models\Permission::get();
        foreach ($permissions as $key => $value) {
            $role->givePermissionTo($value->name);
        }
    }
}
