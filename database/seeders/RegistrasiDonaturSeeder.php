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
                'StatusRegistrasiDonatur' => 'Menunggu Konfirmasi',
                'JenisDonasiDidonasikan' => 'pakaian; alat tulis',
                'DeskripsiBarangDonasi' => 'baju 5 pcs, celana 5 pcs, pensil 10 kotak',
                'TanggalDonasi' => '2024-05-15',
                'JamDonasi' => '09:30:00',
                'StatusDihubungi' => 'Belum',
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanDonasi' => 2,
                'StatusRegistrasiDonatur' => 'Donasi Diterima',
                'JenisDonasiDidonasikan' => 'obat',
                'DeskripsiBarangDonasi' => 'paramex 5 kotak',
                'TanggalDonasi' => '2024-06-10',
                'JamDonasi' => '11:45:00',
                'StatusDihubungi' => 'Belum',
            ],
            [
                'IDDonaturRelawan' => 3,
                'IDKegiatanDonasi' => 1,
                'StatusRegistrasiDonatur' => 'Menunggu Konfirmasi',
                'JenisDonasiDidonasikan' => 'mainan',
                'DeskripsiBarangDonasi' => 'Mainan anak',
                'TanggalDonasi' => '2024-07-20',
                'JamDonasi' => '14:20:00',
                'StatusDihubungi' => 'Belum',
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanDonasi' => 1,
                'StatusRegistrasiDonatur' => 'Donasi Diterima',
                'JenisDonasiDidonasikan' => 'buku',
                'DeskripsiBarangDonasi' => 'Buku pelajaran',
                'TanggalDonasi' => '2024-07-20',
                'JamDonasi' => '14:15:00',
                'StatusDihubungi' => 'Belum',
            ],
        ]);
    }
}
