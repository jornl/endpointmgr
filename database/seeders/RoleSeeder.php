<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'user',
                'label' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'manager',
                'label' => 'Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'technician',
                'label' => 'Technician',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'administrator',
                'label' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
