<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PantiSosialSeeder extends Seeder
{
    public function run()
    {
        DB::table('panti_sosial')->insert([
            [
                'IDUser' => 1,
                'NamaPantiSosial' => 'Panti Asuhan Budi Mulia',
                'NomorRegistrasiPantiSosial' => '12345',
                'DokumenValiditasPantiSosial' => 'doc123.pdf',
                'DeskripsiPantiSosial' => 'Panti asuhan untuk anak-anak yatim piatu',
                'NomorTeleponPantiSosial' => '08123456789',
                'WebsitePantiSosial' => 'www.panti-budimulia.com',
                'AlamatPantiSosial' => 'Jl. Menteng No. 123',
                'LinkGoogleMapsPantiSosial' => 'https://maps.google.com/pantibudimulia',
                'MediaSosialPantiSosial' => 'pantibudimulia_official',
                'LogoPantiSosial' => 'logo_panti.png',
            ],
            [
                'IDUser' => 2,
                'NamaPantiSosial' => 'Panti Jompo Harapan Sejahtera',
                'NomorRegistrasiPantiSosial' => '67890',
                'DokumenValiditasPantiSosial' => 'doc678.pdf',
                'DeskripsiPantiSosial' => 'Panti jompo untuk kaum lanjut usia',
                'NomorTeleponPantiSosial' => '08567890123',
                'WebsitePantiSosial' => 'www.pantijomposejahtera.com',
                'AlamatPantiSosial' => 'Jl. Kebon Kacang No. 456',
                'LinkGoogleMapsPantiSosial' => 'https://maps.google.com/pantijomposejahtera',
                'MediaSosialPantiSosial' => 'pantijomposejahtera_official',
                'LogoPantiSosial' => 'logo_panti_jompo.png',
            ],
            [
                'IDUser' => 5,
                'NamaPantiSosial' => 'Rumah Singgah Nusa Indah',
                'NomorRegistrasiPantiSosial' => '24680',
                'DokumenValiditasPantiSosial' => 'doc246.pdf',
                'DeskripsiPantiSosial' => 'Rumah singgah untuk tunawisma',
                'NomorTeleponPantiSosial' => '08765432100',
                'WebsitePantiSosial' => 'www.rumahsinggahnusaindah.com',
                'AlamatPantiSosial' => 'Jl. Gatot Subroto No. 789',
                'LinkGoogleMapsPantiSosial' => 'https://maps.google.com/rumahsinggahnusaindah',
                'MediaSosialPantiSosial' => 'rumahsinggahnusaindah_official',
                'LogoPantiSosial' => 'logo_rumah_singgah.png',
            ],
        ]);
    }
}
