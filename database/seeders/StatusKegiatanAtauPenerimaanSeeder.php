<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKegiatanAtauPenerimaanSeeder extends Seeder
{
    public function run()
    {
        DB::table('status_kegiatan_atau_penerimaan')->insert([
            ['NamaStatus' => 'Selesai'],
            ['NamaStatus' => 'Belum Selesai'],
            ['NamaStatus' => 'Dibatalkan'],
        ]);
    }
}
