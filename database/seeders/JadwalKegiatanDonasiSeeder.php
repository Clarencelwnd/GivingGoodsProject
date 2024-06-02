<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalKegiatanDonasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('jadwal_kegiatan_donasi')->insert([
            [
                'IDJadwalOperasional' => 1,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 2,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 3,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 4,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 5,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 6,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 7,
                'IDKegiatanDonasi' => 1,
            ],
            [
                'IDJadwalOperasional' => 8,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 9,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 10,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 11,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 12,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 13,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 14,
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 15,
                'IDKegiatanDonasi' => 3,
            ],
            [
                'IDJadwalOperasional' => 16,
                'IDKegiatanDonasi' => 3,
            ],
            [
                'IDJadwalOperasional' => 17,
                'IDKegiatanDonasi' => 3,
            ],
            [
                'IDJadwalOperasional' => 18,
                'IDKegiatanDonasi' => 3,
            ],
            [
                'IDJadwalOperasional' => 19,
                'IDKegiatanDonasi' => 3,
            ],
            [
                'IDJadwalOperasional' => 20,
                'IDKegiatanDonasi' => 3,
            ],
            [
                'IDJadwalOperasional' => 21,
                'IDKegiatanDonasi' => 3,
            ],
        ]);
    }
}
