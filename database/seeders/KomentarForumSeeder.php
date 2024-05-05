<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomentarForumSeeder extends Seeder
{
    public function run()
    {
        DB::table('komentar_forum')->insert([
            [
                'IDPengomentarDonatur' => 1,
                'IDPengomentarPantiSosial' => null,
                'KomentarForum' => 'Saya setuju dengan ide penggalangan dana ini!',
                'TanggalKomentarForum' => now(),
            ],
            [
                'IDPengomentarDonatur' => 2,
                'IDPengomentarPantiSosial' => null,
                'KomentarForum' => 'Mari kita berkumpul dan memberikan yang terbaik untuk mereka yang membutuhkan.',
                'TanggalKomentarForum' => now(),
            ],
            [
                'IDPengomentarDonatur' => 3,
                'IDPengomentarPantiSosial' => null,
                'KomentarForum' => 'Saya punya ide kegiatan sosial yang menarik, mari kita diskusikan lebih lanjut.',
                'TanggalKomentarForum' => now(),
            ],
        ]);
    }
}
