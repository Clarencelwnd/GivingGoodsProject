<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiDonaturSeeder extends Seeder
{
    public function run()
    {
        DB::table('registrasi_donatur')->insert([
            [
                'IDDonaturRelawan' => 1,
                'IDKegiatanDonasi' => 1,
                'StatusKegiatanRelawan' => 'Menunggu Konfirmasi',
                'JenisDonasiDidonasikan' => 'Peralatan Sekolah',
                'DeskripsiBarangDonasi' => 'Buku pelajaran',
                'TanggalDonasi' => '2024-05-15',
                'JamDonasi' => '09:30:00',
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanDonasi' => 2,
                'StatusKegiatanRelawan' => 'Menunggu Konfirmasi',
                'JenisDonasiDidonasikan' => 'Pakaian',
                'DeskripsiBarangDonasi' => 'Baju layak pakai',
                'TanggalDonasi' => '2024-06-10',
                'JamDonasi' => '11:45:00',
            ],
            [
                'IDDonaturRelawan' => 3,
                'IDKegiatanDonasi' => 3,
                'StatusKegiatanRelawan' => 'Menunggu Konfirmasi',
                'JenisDonasiDidonasikan' => 'Mainan',
                'DeskripsiBarangDonasi' => 'Mainan anak',
                'TanggalDonasi' => '2024-07-20',
                'JamDonasi' => '14:20:00',
            ],
        ]);
    }
}
