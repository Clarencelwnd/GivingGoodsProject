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
                'TanggalKegiatanMulaiRelawan' => '2024-05-20',
                'TanggalKegiatanSelesaiRelawan' => '2024-05-21',
                'JamMulaiRelawan' => '08:00:00',
                'JamSelesaiRelawan' => '14:00:00',
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanRelawan' => 2,
                'StatusRegistrasiRelawan' => 'Relawan Ditolak',
                'AlasanRegistrasiRelawan' => 'Saya ingin berbagi ilmu kepada anak-anak.',
                'TanggalKegiatanMulaiRelawan' => '2024-06-05',
                'TanggalKegiatanSelesaiRelawan' => '2024-06-05',
                'JamMulaiRelawan' => '09:00:00',
                'JamSelesaiRelawan' => '12:00:00',
            ],
            [
                'IDDonaturRelawan' => 3,
                'IDKegiatanRelawan' => 1,
                'StatusRegistrasiRelawan' => 'Relawan Diterima',
                'AlasanRegistrasiRelawan' => 'Saya ingin belajar menjadi relawan yang lebih baik.',
                'TanggalKegiatanMulaiRelawan' => '2024-05-20',
                'TanggalKegiatanSelesaiRelawan' => '2024-05-21',
                'JamMulaiRelawan' => '08:00:00',
                'JamSelesaiRelawan' => '14:00:00',
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanRelawan' => 1,
                'StatusRegistrasiRelawan' => 'Relawan Ditolak',
                'AlasanRegistrasiRelawan' => 'Saya ingin menolong sesama',
                'TanggalKegiatanMulaiRelawan' => '2024-05-20',
                'TanggalKegiatanSelesaiRelawan' => '2024-05-21',
                'JamMulaiRelawan' => '08:00:00',
                'JamSelesaiRelawan' => '14:00:00',
            ],
        ]);
    }
}
