<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanDonasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('kegiatan_donasi')->insert([
            [
                'IDPantiSosial' => 1,
                'GambarKegiatanDonasi' => 'gambar1.jpg',
                'NamaKegiatanDonasi' => 'Bakti Sosial Anak Yatim',
                'DeskripsiKegiatanDonasi' => 'Kegiatan untuk memberikan bantuan kepada anak yatim di sekitar wilayah kami.',
                'JenisDonasiDibutuhkan' => 'pakaian; mainan; alat_tulis; buku',
                'TanggalKegiatanDonasiMulai' => '2024-05-15',
                'TanggalKegiatanDonasiSelesai' => '2024-05-17',
                'LokasiKegiatanDonasi' => 'Jl. Merdeka No. 123, Kota ABC',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.google.com/123',
                'created_at' => '2024-05-01 10:05:11',
                'updated_at' => '2024-05-01 10:05:11',
            ],
            [
                'IDPantiSosial' => 2,
                'GambarKegiatanDonasi' => 'gambar2.jpg',
                'NamaKegiatanDonasi' => 'Donasi Makanan untuk Pengungsi',
                'DeskripsiKegiatanDonasi' => 'Kegiatan penggalangan dana untuk memberikan makanan kepada pengungsi di wilayah terdampak bencana.',
                'JenisDonasiDibutuhkan' => 'obat',
                'TanggalKegiatanDonasiMulai' => '2024-06-10',
                'TanggalKegiatanDonasiSelesai' => '2024-06-12',
                'LokasiKegiatanDonasi' => 'Jl. Diponegoro No. 456, Kota XYZ',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.google.com/456',
                'created_at' => '2024-05-01 10:05:11',
                'updated_at' => '2024-05-01 10:05:11',
            ],
            [
                'IDPantiSosial' => 3,
                'GambarKegiatanDonasi' => 'gambar3.jpg',
                'NamaKegiatanDonasi' => 'Kampanye Donasi Pakaian',
                'DeskripsiKegiatanDonasi' => 'Kegiatan pengumpulan pakaian untuk disalurkan kepada masyarakat yang membutuhkan.',
                'JenisDonasiDibutuhkan' => 'keperluan_mandi; keperluan_rumah; keperluan_ibadah; makanan',
                'TanggalKegiatanDonasiMulai' => '2024-07-20',
                'TanggalKegiatanDonasiSelesai' => '2024-07-22',
                'LokasiKegiatanDonasi' => 'Jl. Sudirman No. 789, Kota DEF',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.google.com/789',
                'created_at' => '2024-05-01 10:05:12',
                'updated_at' => '2024-05-06 10:10:43',
            ],
        ]);
    }
}
