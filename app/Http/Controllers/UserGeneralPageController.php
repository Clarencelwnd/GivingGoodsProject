<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use Illuminate\Http\Request;

class UserGeneralPageController extends Controller
{
    public function displayUserGeneralPage($id){
      $kegiatanDonasi = KegiatanDonasi::take(5)->get();
      $kegiatanRelawan = KegiatanRelawan::take(5)->get();

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

      return view('generalPageDonaturRelawan.userGeneralPage', compact('kegiatanDonasi', 'kegiatanRelawan', 'jenisDonasiIcons', 'id'));
    }

    public function FAQ($id){
        return view('FAQ.FAQ', compact('id'));
    }

}
