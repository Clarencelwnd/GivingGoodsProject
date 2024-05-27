<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'pansos1@example.com',
                'password' => Hash::make('pansos1'),
                'role' => 'panti_sosial',
            ],
            [
                'email' => 'pansos2@example.com',
                'password' => Hash::make('pansos2'),
                'role' => 'panti_sosial',
            ],
            [
                'email' => 'donatur1@example.com',
                'password' => Hash::make('donatur1'),
                'role' => 'donatur_relawan',
            ],
            [
                'email' => 'relawan1@example.com',
                'password' => Hash::make('relawan1'),
                'role' => 'donatur_relawan',
            ],
            [
                'email' => 'pansos3@example.com',
                'password' => Hash::make('pansos3'),
                'role' => 'panti_sosial',
            ],
            [
                'email' => 'donatur2@example.com',
                'password' => Hash::make('donatur2'),
                'role' => 'donatur_relawan',
            ],
        ]);

    }
}
