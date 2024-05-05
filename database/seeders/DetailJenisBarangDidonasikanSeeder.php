<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailJenisBarangDidonasikanSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_jenis_barang_didonasikan')->insert([
            [
                'IDRegistrasiDonatur' => 1,
                'IDJenisDonasi' => 1,
            ],
            [
                'IDRegistrasiDonatur' => 2,
                'IDJenisDonasi' => 2,
            ],
            [
                'IDRegistrasiDonatur' => 3,
                'IDJenisDonasi' => 3,
            ],
        ]);
    }
}
