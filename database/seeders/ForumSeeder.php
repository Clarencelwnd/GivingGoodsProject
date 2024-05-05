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
                'IDPembuatForumDonatur' => 1,
                'IDPembuatForumPantiSosial' => null,
                'JudulForum' => 'Diskusi tentang Penggalangan Dana',
                'DeskripsiForum' => 'Mari kita diskusikan strategi penggalangan dana untuk panti sosial.',
                'TanggalBuatForum' => now(),
            ],
            [
                'IDPembuatForumDonatur' => 2,
                'IDPembuatForumPantiSosial' => null,
                'JudulForum' => 'Bincang Seputar Aksi Sosial',
                'DeskripsiForum' => 'Bagaimana cara terbaik untuk membantu masyarakat yang membutuhkan?',
                'TanggalBuatForum' => now(),
            ],
            [
                'IDPembuatForumDonatur' => 3,
                'IDPembuatForumPantiSosial' => null,
                'JudulForum' => 'Ide Kegiatan Relawan',
                'DeskripsiForum' => 'Bagikan ide-ide kreatif Anda untuk kegiatan relawan yang bermanfaat.',
                'TanggalBuatForum' => now(),
            ],
        ]);
    }
}
