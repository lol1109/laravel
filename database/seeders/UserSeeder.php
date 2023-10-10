<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visit;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        	'name' => 'superadmin',
        	'email' => 'admin@gmail.com',
        	'password' => Hash::make('123456')
        ])
    }
}
