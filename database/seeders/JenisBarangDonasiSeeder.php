<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangDonasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_barang_donasi')->insert([
            ['JenisDonasi' => 'Pakaian'],
            ['JenisDonasi' => 'Makanan'],
            ['JenisDonasi' => 'Obat-obatan'],
        ]);
    }
}
