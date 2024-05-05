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
                'IDKegiatanDonasi' => 2,
            ],
            [
                'IDJadwalOperasional' => 3,
                'IDKegiatanDonasi' => 3,
            ],
        ]);
    }
}
