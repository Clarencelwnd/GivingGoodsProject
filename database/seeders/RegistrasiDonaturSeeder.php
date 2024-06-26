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
                'JenisDonasiDidonasikan' => 'pakaian,alat_tulis,sepatu',
                'DeskripsiBarangDonasi' => 'baju 5 pcs, celana 5 pcs, pensil 10 kotak, sepatu 5 pasang',
                'PengirimanBarang' => 'Antar sendiri',
                'TanggalDonasi' => '2024-05-15',
                'JamDonasi' => '09:30:00',
                'StatusDihubungi' => 'Belum'
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanDonasi' => 2,
                'StatusRegistrasiDonatur' => 'Konfirmasi Diterima',
                'JenisDonasiDidonasikan' => 'obat,alat_tulis',
                'DeskripsiBarangDonasi' => 'paramex 5 kotak, pensil 100 pcs',
                'PengirimanBarang' => 'Antar sendiri',
                'TanggalDonasi' => '2024-06-10',
                'JamDonasi' => '11:45:00',
                'StatusDihubungi' => 'Belum'
            ],
            [
                'IDDonaturRelawan' => 3,
                'IDKegiatanDonasi' => 1,
                'StatusRegistrasiDonatur' => 'Menunggu Konfirmasi',
                'JenisDonasiDidonasikan' => 'mainan',
                'DeskripsiBarangDonasi' => 'Mainan anak',
                'PengirimanBarang' => 'Antar sendiri',
                'TanggalDonasi' => '2024-07-20',
                'JamDonasi' => '14:20:00',
                'StatusDihubungi' => 'Belum'
            ],
            [
                'IDDonaturRelawan' => 2,
                'IDKegiatanDonasi' => 1,
                'StatusRegistrasiDonatur' => 'Konfirmasi Diterima',
                'JenisDonasiDidonasikan' => 'buku',
                'DeskripsiBarangDonasi' => 'Buku pelajaran',
                'PengirimanBarang' => 'Antar sendiri',
                'TanggalDonasi' => '2024-07-20',
                'JamDonasi' => '14:15:00',
                'StatusDihubungi' => 'Belum'
            ],
        ]);
    }
}
