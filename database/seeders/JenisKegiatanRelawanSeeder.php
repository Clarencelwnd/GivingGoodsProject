<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKegiatanRelawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_kegiatan_relawan')->insert([
            ['JenisKegiatanRelawan' => 'Bersih-bersih lingkungan'],
            ['JenisKegiatanRelawan' => 'Pembuatan dan distribusi makanan'],
            ['JenisKegiatanRelawan' => 'Pengajaran dan pendidikan'],
        ]);
    }
}
