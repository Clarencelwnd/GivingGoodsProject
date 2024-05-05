<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiRelawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('registrasi_relawan')->insert([
            [
                'IDDonaturRelawan' => 1,
                'IDKegiatanRelawan' => 1,
                'IDStatus' => 1,
                'AlasanRegistrasiRelawan' => 'Saya ingin membantu sesama.',
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanRelawan' => 2,
                'IDStatus' => 1,
                'AlasanRegistrasiRelawan' => 'Saya ingin berbagi ilmu kepada anak-anak.',
            ],
            [
                'IDDonaturRelawan' => 3,
                'IDKegiatanRelawan' => 3,
                'IDStatus' => 2,
                'AlasanRegistrasiRelawan' => 'Saya ingin belajar menjadi relawan yang lebih baik.',
            ],
        ]);
    }
}
