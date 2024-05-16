<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DonaturAtauRelawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('donatur_atau_relawan')->insert([
            [
                'IDUser' => 3,
                'NamaDonaturRelawan' => 'Donatur Pertama',
                'TanggalLahirDonaturRelawan' => '1990-05-15',
                'JenisKelaminDonaturRelawan' => 'Laki-laki',
                'NomorTeleponDonaturRelawan' => '08111222333',
                'AlamatDonaturRelawan' => 'Jl. Sudirman No. 123',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.google.com/donatur1',
                'FotoDonaturRelawan' => 'foto_donatur1.png',
            ],
            [
                'IDUser' => 6,
                'NamaDonaturRelawan' => 'Donatur Kedua',
                'TanggalLahirDonaturRelawan' => '1985-10-20',
                'JenisKelaminDonaturRelawan' => 'Perempuan',
                'NomorTeleponDonaturRelawan' => '08233445566',
                'AlamatDonaturRelawan' => 'Jl. Thamrin No. 456',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.google.com/donatur2',
                'FotoDonaturRelawan' => 'foto_donatur2.png',
            ],
            [
                'IDUser' => 4,
                'NamaDonaturRelawan' => 'Relawan Pertama',
                'TanggalLahirDonaturRelawan' => '1992-08-25',
                'JenisKelaminDonaturRelawan' => 'Laki-laki',
                'NomorTeleponDonaturRelawan' => '08355667788',
                'AlamatDonaturRelawan' => 'Jl. HR Rasuna Said No. 789',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.google.com/relawan1',
                'FotoDonaturRelawan' => 'foto_relawan1.png',
            ],
        ]);
    }
}
