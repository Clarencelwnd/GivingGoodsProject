<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalOperasionalSeeder extends Seeder
{
    public function run()
    {
        DB::table('jadwal_operasional')->insert([
            [
                'IDPantiSosial' => 1,
                'Hari' => 'Senin',
                'JamBukaPantiSosial' => '08:00:00',
                'JamTutupPantiSosial' => '17:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Selasa',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Rabu',
                'JamBukaPantiSosial' => '07:30:00',
                'JamTutupPantiSosial' => '16:30:00',
            ],
        ]);
    }
}
