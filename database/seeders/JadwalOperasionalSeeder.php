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
                'IDPantiSosial' => 1,
                'Hari' => 'Selasa',
                'JamBukaPantiSosial' => '08:00:00',
                'JamTutupPantiSosial' => '17:00:00',
            ],
            [
                'IDPantiSosial' => 1,
                'Hari' => 'Rabu',
                'JamBukaPantiSosial' => '08:00:00',
                'JamTutupPantiSosial' => '17:00:00',
            ],
            [
                'IDPantiSosial' => 1,
                'Hari' => 'Kamis',
                'JamBukaPantiSosial' => '08:00:00',
                'JamTutupPantiSosial' => '17:00:00',
            ],
            [
                'IDPantiSosial' => 1,
                'Hari' => 'Jumat',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '15:00:00',
            ],
            [
                'IDPantiSosial' => 1,
                'Hari' => 'Sabtu',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '15:00:00',
            ],
            [
                'IDPantiSosial' => 1,
                'Hari' => 'Minggu',
                'JamBukaPantiSosial' => '08:00:00',
                'JamTutupPantiSosial' => '20:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Senin',
                'JamBukaPantiSosial' => '08:00:00',
                'JamTutupPantiSosial' => '22:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Selasa',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Rabu',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Kamis',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Jumat',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Sabtu',
                'JamBukaPantiSosial' => '09:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 2,
                'Hari' => 'Minggu',
                'JamBukaPantiSosial' => '06:00:00',
                'JamTutupPantiSosial' => '18:00:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Senin',
                'JamBukaPantiSosial' => '07:30:00',
                'JamTutupPantiSosial' => '16:30:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Selasa',
                'JamBukaPantiSosial' => '07:30:00',
                'JamTutupPantiSosial' => '16:30:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Rabu',
                'JamBukaPantiSosial' => '07:30:00',
                'JamTutupPantiSosial' => '16:30:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Kamis',
                'JamBukaPantiSosial' => '07:30:00',
                'JamTutupPantiSosial' => '16:30:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Jumat',
                'JamBukaPantiSosial' => '07:30:00',
                'JamTutupPantiSosial' => '16:30:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Sabtu',
                'JamBukaPantiSosial' => '00:00:00',
                'JamTutupPantiSosial' => '00:00:00',
            ],
            [
                'IDPantiSosial' => 3,
                'Hari' => 'Minggu',
                'JamBukaPantiSosial' => '00:00:00',
                'JamTutupPantiSosial' => '00:00:00',
            ],
        ]);
    }
}
