<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    public function run()
    {
        DB::table('forum')->insert([
            [
                'IDDonaturRelawanPembuatForum' => 1,
                'IDPantiSosialPembuatForum' => null,
                'JudulForum' => 'Diskusi tentang Penggalangan Dana',
                'DeskripsiForum' => 'Mari kita diskusikan strategi penggalangan dana untuk panti sosial.',
                'TanggalBuatForum' => now(),
            ],
            [
                'IDDonaturRelawanPembuatForum' => 2,
                'IDPantiSosialPembuatForum' => null,
                'JudulForum' => 'Bincang Seputar Aksi Sosial',
                'DeskripsiForum' => 'Bagaimana cara terbaik untuk membantu masyarakat yang membutuhkan?',
                'TanggalBuatForum' => now(),
            ],
            [
                'IDDonaturRelawanPembuatForum' => 3,
                'IDPantiSosialPembuatForum' => null,
                'JudulForum' => 'Ide Kegiatan Relawan',
                'DeskripsiForum' => 'Bagikan ide-ide kreatif Anda untuk kegiatan relawan yang bermanfaat.',
                'TanggalBuatForum' => now(),
            ],
        ]);
    }
}
