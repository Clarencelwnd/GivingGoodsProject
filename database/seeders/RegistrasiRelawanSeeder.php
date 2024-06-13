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
                'StatusRegistrasiRelawan' => 'Menunggu Konfirmasi',
                'AlasanRegistrasiRelawan' => 'Saya ingin membantu sesama.',
                'TanggalKehadiranRelawan' => '2024-05-20',
                'StatusDihubungi' => 'Belum'
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanRelawan' => 2,
                'StatusRegistrasiRelawan' => 'Relawan Ditolak',
                'AlasanRegistrasiRelawan' => 'Saya ingin berbagi ilmu kepada anak-anak.',
                'TanggalKehadiranRelawan' => '2024-06-05',
                'StatusDihubungi' => 'Belum'
            ],
            [
                'IDDonaturRelawan' => 3,
                'IDKegiatanRelawan' => 1,
                'StatusRegistrasiRelawan' => 'Relawan Diterima',
                'AlasanRegistrasiRelawan' => 'Saya ingin belajar menjadi relawan yang lebih baik.',
                'TanggalKehadiranRelawan' => '2024-05-20',
                'StatusDihubungi' => 'Belum'
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanRelawan' => 1,
                'StatusRegistrasiRelawan' => 'Relawan Ditolak',
                'AlasanRegistrasiRelawan' => 'Saya ingin menolong sesama',
                'TanggalKehadiranRelawan' => '2024-05-20',
                'StatusDihubungi' => 'Belum'
            ],
        ]);
    }
}
