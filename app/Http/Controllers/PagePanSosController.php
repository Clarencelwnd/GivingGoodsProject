<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\PantiSosial;


class PagePanSosController extends Controller
{

    public function show($IDPantiSosial, $IDDonaturRelawan)
{
    // Mendapatkan informasi panti sosial berdasarkan ID
    $pantiSosial = PantiSosial::findOrFail($IDPantiSosial);

    // Mendapatkan informasi donatur/relawan berdasarkan ID
    $donaturRelawan = DonaturAtauRelawan::findOrFail($IDDonaturRelawan);

    // Mengambil kegiatan relawan dengan ID Panti Sosial yang sesuai
    $kegiatanRelawan = KegiatanRelawan::where('IDPantiSosial', $IDPantiSosial)->get();

    // Mengambil kegiatan donasi dengan ID Panti Sosial yang sesuai
    $kegiatanDonasi = KegiatanDonasi::where('IDPantiSosial', $IDPantiSosial)->get();

    // Inisialisasi array kosong untuk $activities
    $activities = [];

    $jenisDonasiIcons = [
        'alat_tulis' => 'Image/donasi/alat_tulis.png',
        'buku' => 'Image/donasi/buku.png',
        'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
        'mainan' => 'Image/donasi/mainan.png',
        'makanan' => 'Image/donasi/makanan.png',
        'obat' => 'Image/donasi/obat.png',
        'pakaian' => 'Image/donasi/pakaian.png',
        'keperluan_ibadah' => 'Image/donasi/perlengkapan_ibadah.png',
        'sepatu' => 'Image/donasi/sepatu.png',
        'keperluan_mandi' => 'Image/donasi/toiletries.png'
    ];

    // Looping untuk menambahkan kegiatan relawan ke dalam $activities
    foreach ($kegiatanRelawan as $relawan) {
        $activities[] = (object) [
            'IDKegiatanRelawan' => $relawan->IDKegiatanRelawan,
            'NamaKegiatanRelawan' => $relawan->NamaKegiatanRelawan,
            'GambarKegiatan' => $relawan->GambarKegiatanRelawan, // Ubah disini
            'JenisKegiatanRelawan' => $relawan->JenisKegiatanRelawan,
            'pantiSosial' => $pantiSosial,
        ];
    }

    // Looping untuk menambahkan kegiatan donasi ke dalam $activities
    foreach ($kegiatanDonasi as $donasi) {
        $activities[] = (object) [
            'IDKegiatanDonasi' => $donasi->IDKegiatanDonasi,
            'NamaKegiatanDonasi' => $donasi->NamaKegiatanDonasi,
            'GambarKegiatan' => $donasi->GambarKegiatanDonasi, // Ubah disini
            'JenisDonasiDibutuhkan' => $donasi->JenisDonasiDibutuhkan,
            'pantiSosial' => $pantiSosial,
            'jenisDonasiIcons'=>$jenisDonasiIcons,
        ];
    }



    // Variabel ID untuk keperluan customisasi di view
    $id = $IDDonaturRelawan;

    // Mengirimkan data ke view dengan compact
    return view('DetailPantiSosial.PagePanSos', compact('pantiSosial', 'donaturRelawan', 'activities', 'id'));
}



}
