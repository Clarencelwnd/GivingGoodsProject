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
                'EmailDonaturRelawan' => 'donatur1@example.com',
                'PasswordDonaturRelawan' => Hash::make('password1'),
                'NamaDonaturRelawan' => 'Donatur Pertama',
                'TanggalLahirDoanturRelawan' => '1990-05-15',
                'JenisKelaminDonaturRelawan' => 'Laki-laki',
                'NomorTeleponDonaturRelawan' => '08111222333',
                'AlamatDonaturRelawan' => 'Jl. Sudirman No. 123',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.google.com/donatur1',
                'FotoDonaturRelawan' => 'foto_donatur1.png',
            ],
            [
                'EmailDonaturRelawan' => 'donatur2@example.com',
                'PasswordDonaturRelawan' => Hash::make('password2'),
                'NamaDonaturRelawan' => 'Donatur Kedua',
                'TanggalLahirDoanturRelawan' => '1985-10-20',
                'JenisKelaminDonaturRelawan' => 'Perempuan',
                'NomorTeleponDonaturRelawan' => '08233445566',
                'AlamatDonaturRelawan' => 'Jl. Thamrin No. 456',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.google.com/donatur2',
                'FotoDonaturRelawan' => 'foto_donatur2.png',
            ],
            [
                'EmailDonaturRelawan' => 'relawan1@example.com',
                'PasswordDonaturRelawan' => Hash::make('password3'),
                'NamaDonaturRelawan' => 'Relawan Pertama',
                'TanggalLahirDoanturRelawan' => '1992-08-25',
                'JenisKelaminDonaturRelawan' => 'Laki-laki',
                'NomorTeleponDonaturRelawan' => '08355667788',
                'AlamatDonaturRelawan' => 'Jl. HR Rasuna Said No. 789',
                'LinkGoogleMapsDonaturRelawan' => 'https://maps.google.com/relawan1',
                'FotoDonaturRelawan' => 'foto_relawan1.png',
            ],
        ]);

    }
}
