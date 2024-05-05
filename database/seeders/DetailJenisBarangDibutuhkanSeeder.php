<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailJenisBarangDibutuhkanSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_jenis_barang_dibutuhkan')->insert([
            [
                'IDKegiatanDonasi' => 1,
                'IDJenisDonasi' => 1,
            ],
            [
                'IDKegiatanDonasi' => 2,
                'IDJenisDonasi' => 2,
            ],
            [
                'IDKegiatanDonasi' => 3,
                'IDJenisDonasi' => 3,
            ],
        ]);
    }
}
