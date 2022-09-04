<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
        ['email' =>  'test@gmail.com'], 
        [
            'email' => 'test@gmail.com', 
            'name' => 'Test User',
            'password' => Hash::make('password')
        ]);

        User::firstOrCreate(
        ['email' =>  'admin@gmail.com'], 
        [
            'email' => 'admin@gmail.com', 
            'name' => 'Admin User',
            'password' => Hash::make('password')
        ]);
    }
}
