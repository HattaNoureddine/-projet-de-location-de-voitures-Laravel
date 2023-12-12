<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'prenom' => 'Admin',
                'tel' => '0889898979',
                'cin' => 'J9J77',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('12345678')          
            ]
        );
    }
}
