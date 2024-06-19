<?php

namespace Database\Seeders;

use App\Models\User;
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
                'NomorTeleponDonaturRelawan' => '+628111222333',
                'AlamatDonaturRelawan' => 'Jl. Sudirman No. 123',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.app.goo.gl/7r5YzWLuQrjEA5cKA',
                'FotoDonaturRelawan' => 'https://www.gravatar.com/avatar/?d=mp&s=200',
            ],
            [
                'IDUser' => 6,
                'NamaDonaturRelawan' => 'Donatur Kedua',
                'TanggalLahirDonaturRelawan' => '1985-10-20',
                'JenisKelaminDonaturRelawan' => 'Perempuan',
                'NomorTeleponDonaturRelawan' => '+628111222333',
                'AlamatDonaturRelawan' => 'Jl. Thamrin No. 456',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.app.goo.gl/7r5YzWLuQrjEA5cKADD',
                'FotoDonaturRelawan' => 'https://www.gravatar.com/avatar/?d=mp&s=200',
            ],
            [
                'IDUser' => 4,
                'NamaDonaturRelawan' => 'Relawan Pertama',
                'TanggalLahirDonaturRelawan' => '1992-08-25',
                'JenisKelaminDonaturRelawan' => 'Laki-laki',
                'NomorTeleponDonaturRelawan' => '+628111222333',
                'AlamatDonaturRelawan' => 'Jl. HR Rasuna Said No. 789',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.app.goo.gl/fY6k1ETrsrUoxybu9',
                'FotoDonaturRelawan' => 'https://www.gravatar.com/avatar/?d=mp&s=200',
            ],
        ]);

    }
}
