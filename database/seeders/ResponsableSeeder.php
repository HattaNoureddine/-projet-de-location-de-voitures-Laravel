<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Responsable',
                'prenom' => 'Responsable',
                'tel' => '0909898979',
                'cin' => 'JHJ77',
                'email' => 'responsable@gmail.com',
                'role' => 'responsable',
                'password' => Hash::make('12345678')          
            ]
        );
    }
}
