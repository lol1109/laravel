<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        	'password' => Hash::make('12345678!')
        ]);
    }
}
