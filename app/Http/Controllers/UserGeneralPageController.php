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
        $original_name = $request->file('GambarKegiatanRelawan')->getClientOriginalName();
        $request->file('GambarKegiatanRelawan')->storeAs('public/Profile', $original_name);
        $gambarKegiatanRelawan = 'storage/Profile/' . $original_name;
        return view('generalPageDonaturRelawan.userGeneralPage', compact('gambarKegiatanRelawan'));
    }


}
