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
                'JenisDonasiDibutuhkan' => 'pakaian;mainan;alat_tulis;buku',
                'DeskripsiJenisDonasi' => 'pakaian layak, mainan bagus, alat tulis bisa dipakai, buku cerita',
                'TanggalKegiatanDonasiMulai' => '2024-05-15',
                'TanggalKegiatanDonasiSelesai' => '2024-05-17',
                'LokasiKegiatanDonasi' => 'Jl. Merdeka No. 123, Kota ABC',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.app.goo.gl/RDLP2CJ3ZvYVKuf28',
                'created_at' => '2024-05-01 10:05:11',
                'updated_at' => '2024-05-01 10:05:11',
                'JasaPickup' => 'Ya, kami memiliki jasa pick up'
            ],
            [
                'IDPantiSosial' => 2,
                'GambarKegiatanDonasi' => 'gambar2.jpg',
                'NamaKegiatanDonasi' => 'Donasi Makanan untuk Pengungsi',
                'DeskripsiKegiatanDonasi' => 'Kegiatan penggalangan dana untuk memberikan makanan kepada pengungsi di wilayah terdampak bencana.',
                'JenisDonasiDibutuhkan' => 'obat',
                'DeskripsiJenisDonasi' => 'obat demam dan pilek',
                'TanggalKegiatanDonasiMulai' => '2024-06-10',
                'TanggalKegiatanDonasiSelesai' => '2024-06-12',
                'LokasiKegiatanDonasi' => 'Jl. Diponegoro No. 456, Kota XYZ',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.app.goo.gl/xFDrmhpSH1zDBgMt8',
                'created_at' => '2024-05-01 10:05:11',
                'updated_at' => '2024-05-01 10:05:11',
                'JasaPickup' => 'Tidak, kami tidak memiliki jasa pick up'
            ],
            [
                'IDPantiSosial' => 3,
                'GambarKegiatanDonasi' => 'gambar3.jpg',
                'NamaKegiatanDonasi' => 'Kampanye Donasi Pakaian',
                'DeskripsiKegiatanDonasi' => 'Kegiatan pengumpulan pakaian untuk disalurkan kepada masyarakat yang membutuhkan.',
                'JenisDonasiDibutuhkan' => 'keperluan_mandi;keperluan_rumah;keperluan_ibadah;makanan',
                'DeskripsiJenisDonasi' => 'alat mandi, keperluan rumah, keperluan ibadah, makanan enak',
                'TanggalKegiatanDonasiMulai' => '2024-07-20',
                'TanggalKegiatanDonasiSelesai' => '2024-07-22',
                'LokasiKegiatanDonasi' => 'Jl. Sudirman No. 789, Kota DEF',
                'LinkGoogleMapsLokasiKegiatanDonasi' => 'https://maps.app.goo.gl/HK6jHDtQx2kV4FUX7',
                'created_at' => '2024-05-01 10:05:12',
                'updated_at' => '2024-05-06 10:10:43',
                'JasaPickup' => 'Ya, kami memiliki jasa pick up'
            ],
        ]);
    }
}
