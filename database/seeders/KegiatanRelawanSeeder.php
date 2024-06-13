<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanRelawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('kegiatan_relawan')->insert([
            [
                'IDPantiSosial' => 1,
                'GambarKegiatanRelawan' => 'gambar1.jpg',
                'NamaKegiatanRelawan' => 'Bersih-bersih Lingkungan',
                'DeskripsiKegiatanRelawan' => 'Kegiatan membersihkan lingkungan sekitar untuk menjaga kebersihan dan kesehatan bersama.',
                'JenisKegiatanRelawan' => 'Bencana Alam',
                'TanggalKegiatanRelawanMulai' => '2024-05-20',
                'TanggalKegiatanRelawanSelesai' => '2024-05-21',
                'TanggalPendaftaranKegiatanDitutup' => '2024-05-18',
                'JamMulaiKegiatanRelawan' => '08:00:00',
                'JamSelesaiKegiatanRelawan' => '14:00:00',
                'JumlahRelawanDibutuhkan' => 30,
                'LokasiKegiatanRelawan' => 'Taman Kota ABC',
                'LinkGoogleMapsLokasiKegiatanRelawan' => 'https://maps.app.goo.gl/bRqeBuKisrfadXWPA',
                'KriteriaRelawan' => 'Punya semangat dan kepedulian tinggi terhadap lingkungan.',
                'SyaratDanInstruksiKegiatanRelawan' => 'Membawa alat pembersih sendiri.',
                'KontakKegiatanRelawan' => '081234567890 (Johan)',
                'created_at' => '2024-05-01 10:05:11',
                'updated_at' => '2024-05-01 10:05:11',
            ],
            [
                'IDPantiSosial' => 2,
                'GambarKegiatanRelawan' => 'gambar2.jpg',
                'NamaKegiatanRelawan' => 'Mengajar Anak-anak Miskin',
                'DeskripsiKegiatanRelawan' => 'Kegiatan pengajaran dasar untuk anak-anak miskin di wilayah sekitar.',
                'JenisKegiatanRelawan' => 'Pendidikan',
                'TanggalKegiatanRelawanMulai' => '2024-06-05',
                'TanggalKegiatanRelawanSelesai' => '2024-06-06',
                'TanggalPendaftaranKegiatanDitutup' => '2024-06-01',
                'JamMulaiKegiatanRelawan' => '09:00:00',
                'JamSelesaiKegiatanRelawan' => '12:00:00',
                'JumlahRelawanDibutuhkan' => 20,
                'LokasiKegiatanRelawan' => 'Ruang Belajar XYZ',
                'LinkGoogleMapsLokasiKegiatanRelawan' => 'https://maps.app.goo.gl/oqRQb5tqtucgK48v6',
                'KriteriaRelawan' => 'Punya kemampuan mengajar dan peduli terhadap pendidikan anak-anak.',
                'SyaratDanInstruksiKegiatanRelawan' => 'Membawa materi ajaran sendiri.',
                'KontakKegiatanRelawan' => '081234567891 (Lili)',
                'created_at' => '2024-05-01 10:05:11',
                'updated_at' => '2024-05-01 10:05:11',
            ],
            [
                'IDPantiSosial' => 3,
                'GambarKegiatanRelawan' => 'gambar3.jpg',
                'NamaKegiatanRelawan' => 'Pengobatan Gratis',
                'DeskripsiKegiatanRelawan' => 'Kegiatan memberikan pelayanan pengobatan gratis kepada masyarakat yang membutuhkan.',
                'JenisKegiatanRelawan' => 'Kesehatan',
                'TanggalKegiatanRelawanMulai' => '2024-07-10',
                'TanggalKegiatanRelawanSelesai' => '2024-07-12',
                'TanggalPendaftaranKegiatanDitutup' => '2024-07-05',
                'JamMulaiKegiatanRelawan' => '10:00:00',
                'JamSelesaiKegiatanRelawan' => '15:00:00',
                'JumlahRelawanDibutuhkan' => 40,
                'LokasiKegiatanRelawan' => 'Puskesmas DEF',
                'LinkGoogleMapsLokasiKegiatanRelawan' => 'https://maps.app.goo.gl/m658FznXXDtJKkLh7',
                'KriteriaRelawan' => 'Punya keahlian dalam bidang kesehatan.',
                'SyaratDanInstruksiKegiatanRelawan' => 'Membawa peralatan medis dasar.',
                'KontakKegiatanRelawan' => '081234567892 (Cantika)',
                'created_at' => '2024-05-19 00:01:44',
                'updated_at' => '2024-05-19 00:03:22',
            ],
        ]);
    }
}
