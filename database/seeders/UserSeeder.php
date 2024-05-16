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
                'Email' => 'pansos1@example.com',
                'Password' => Hash::make('pansos1'),
                'Role' => 'panti_sosial',
            ],
            [
                'Email' => 'pansos2@example.com',
                'Password' => Hash::make('pansos2'),
                'Role' => 'panti_sosial',
            ],
            [
                'Email' => 'donatur1@example.com',
                'Password' => Hash::make('donatur1'),
                'Role' => 'donatur_relawan',
            ],
            [
                'Email' => 'relawan1@example.com',
                'Password' => Hash::make('relawan1'),
                'Role' => 'donatur_relawan',
            ],
            [
                'Email' => 'pansos3@example.com',
                'Password' => Hash::make('pansos3'),
                'Role' => 'panti_sosial',
            ],
            [
                'Email' => 'donatur2@example.com',
                'Password' => Hash::make('donatur2'),
                'Role' => 'donatur_relawan',
            ],
        ]);

    }
}
