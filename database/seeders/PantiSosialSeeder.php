<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PantiSosialSeeder extends Seeder
{
    public function run()
    {
        DB::table('panti_sosial')->insert([
            [
                'IDUser' => 1,
                'NamaPantiSosial' => 'Panti Asuhan Budi Mulia',
                'EmailPantiSosial' => 'budimulia@gmail.com',
                'NomorRegistrasiPantiSosial' => '12345',
                'DokumenValiditasPantiSosial' => 'doc123.pdf',
                'DeskripsiPantiSosial' => 'Panti asuhan untuk anak-anak yatim piatu',
                'NomorTeleponPantiSosial' => '+628111222333',
                'WebsitePantiSosial' => 'www.panti-budimulia.com',
                'AlamatPantiSosial' => 'Jl. Menteng No. 123',
                'LinkGoogleMapsPantiSosial' => 'https://maps.app.goo.gl/RDLP2CJ3ZvYVKuf28',
                'MediaSosialPantiSosial' => 'Instagram: pantibudimulia_official; Facebook: pantibudimulia;',
                'LogoPantiSosial' => 'https://www.gravatar.com/avatar/?d=mp&s=200',
            ],
            [
                'IDUser' => 2,
                'NamaPantiSosial' => 'Panti Jompo Harapan Sejahtera',
                'EmailPantiSosial' => 'jompoharapan@gmail.com',
                'NomorRegistrasiPantiSosial' => '67890',
                'DokumenValiditasPantiSosial' => 'doc678.pdf',
                'DeskripsiPantiSosial' => 'Panti jompo untuk kaum lanjut usia',
                'NomorTeleponPantiSosial' => '+628111222333',
                'WebsitePantiSosial' => 'www.pantijomposejahtera.com',
                'AlamatPantiSosial' => 'Jl. Kebon Kacang No. 456',
                'LinkGoogleMapsPantiSosial' => 'https://maps.app.goo.gl/xFDrmhpSH1zDBgMt8',
                'MediaSosialPantiSosial' => 'Instagram: pantijomposejahtera_official;',
                'LogoPantiSosial' => 'https://www.gravatar.com/avatar/?d=mp&s=200',
            ],
            [
                'IDUser' => 5,
                'NamaPantiSosial' => 'Rumah Singgah Nusa Indah',
                'EmailPantiSosial' => 'nusaindah@example.com',
                'NomorRegistrasiPantiSosial' => '24680',
                'DokumenValiditasPantiSosial' => 'doc246.pdf',
                'DeskripsiPantiSosial' => 'Rumah singgah untuk tunawisma',
                'NomorTeleponPantiSosial' => '+628111222333',
                'WebsitePantiSosial' => 'www.rumahsinggahnusaindah.com',
                'AlamatPantiSosial' => 'Jl. Gatot Subroto No. 789',
                'LinkGoogleMapsPantiSosial' => 'https://maps.app.goo.gl/HK6jHDtQx2kV4FUX7',
                'MediaSosialPantiSosial' => 'Facebook: rumahsinggahnusaindah_official;',
                'LogoPantiSosial' => 'https://www.gravatar.com/avatar/?d=mp&s=200',
            ],
        ]);
    }
}
