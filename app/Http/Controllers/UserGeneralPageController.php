<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use Illuminate\Http\Request;

class UserGeneralPageController extends Controller
{
    public function displayUserGeneralPage(){
      $kegiatanDonasi = KegiatanDonasi::take(5)->get();
      $kegiatanRelawan = KegiatanRelawan::take(5)->get();
      return view('generalPageDonaturRelawan/userGeneralPage', compact('kegiatanDonasi', 'kegiatanRelawan'));
    }

    public function displayKegiatanImage(Request $request, $id){
        $kegiatanDonasi = KegiatanDonasi::find($id);

        return view('generalPageDonaturRelawan.userGeneralPage', ['kegiatanDonasi' => $kegiatanDonasi]);
    }

}
