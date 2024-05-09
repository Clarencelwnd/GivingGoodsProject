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
                'IDDonaturRelawanPengomentarForum' => 1,
                'IDPantiSosialPengomentarForum' => null,
                'KomentarForum' => 'Saya setuju dengan ide penggalangan dana ini!',
                'TanggalKomentarForum' => now(),
            ],
            [
                'IDDonaturRelawanPengomentarForum' => null,
                'IDPantiSosialPengomentarForum' => 2,
                'KomentarForum' => 'Mari kita berkumpul dan memberikan yang terbaik untuk mereka yang membutuhkan.',
                'TanggalKomentarForum' => now(),
            ],
            [
                'IDDonaturRelawanPengomentarForum' => 3,
                'IDPantiSosialPengomentarForum' => null,
                'KomentarForum' => 'Saya punya ide kegiatan sosial yang menarik, mari kita diskusikan lebih lanjut.',
                'TanggalKomentarForum' => now(),
            ],
        ]);
    }
}
