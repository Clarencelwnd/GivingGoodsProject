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
                'TanggalKegiatanDonasiMulai' => '2024-05-15',
                'TanggalKegiatanDonasiSelesai' => '2024-05-17',
                'LokasiKegiatanDonasi' => 'Jl. Merdeka No. 123, Kota ABC',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.google.com/123',
                'StatusKegiatanDonasi' => 'Open',
                'JenisDonasiDibutuhkan' => 'Pakaian',
                'DeskripsiJenisDonasi' => 'Kami membutuhkan bantuan berupa pakaian layak pakai untuk anak-anak usia 5-12 tahun. Pakaian yang dibutuhkan termasuk seragam sekolah, baju hangat, dan sepatu.'
            ],
            [
                'IDPantiSosial' => 2,
                'GambarKegiatanDonasi' => 'gambar2.jpg',
                'NamaKegiatanDonasi' => 'Donasi Makanan untuk Pengungsi',
                'DeskripsiKegiatanDonasi' => 'Kegiatan penggalangan dana untuk memberikan makanan kepada pengungsi di wilayah terdampak bencana.',
                'TanggalKegiatanDonasiMulai' => '2024-06-10',
                'TanggalKegiatanDonasiSelesai' => '2024-06-12',
                'LokasiKegiatanDonasi' => 'Jl. Diponegoro No. 456, Kota XYZ',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.google.com/456',
                'StatusKegiatanDonasi' => 'Closed',
                'JenisDonasiDibutuhkan' => 'Perlengkapan sekolah',
                'DeskripsiJenisDonasi' => 'Bantuan yang diperlukan berupa buku pelajaran dan alat tulis untuk mendukung kegiatan belajar mengajar di sekolah-sekolah pedalaman. Buku yang dibutuhkan meliputi buku matematika, sains, dan bahasa.'
            ],
            [
                'IDPantiSosial' => 3,
                'GambarKegiatanDonasi' => 'gambar3.jpg',
                'NamaKegiatanDonasi' => 'Kampanye Donasi Pakaian',
                'DeskripsiKegiatanDonasi' => 'Kegiatan pengumpulan pakaian untuk disalurkan kepada masyarakat yang membutuhkan.',
                'TanggalKegiatanDonasiMulai' => '2024-07-20',
                'TanggalKegiatanDonasiSelesai' => '2024-07-22',
                'LokasiKegiatanDonasi' => 'Jl. Sudirman No. 789, Kota DEF',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.google.com/789',
                'StatusKegiatanDonasi' => 'On Going',
                'JenisDonasiDibutuhkan' => 'Mainan',
                'DeskripsiJenisDonasi' => 'Kami mencari donasi berupa bahan makanan pokok seperti beras, minyak goreng, gula, dan tepung untuk disalurkan kepada keluarga kurang mampu di desa-desa terpencil.'

            ],
        ]);
    }
}
