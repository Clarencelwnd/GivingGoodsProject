<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use App\Models\PantiSosial;
use Illuminate\Http\Request;

class PantiSosialController extends Controller
{

    // public function displaySearchResult($id){
    //     $pantiSosial = PantiSosial::findOrFail($id);
    //     $kegiatanDonasi = KegiatanDonasi::where('IDPantiSosial', $id)->get();
    //     $kegiatanRelawan = KegiatanRelawan::where('IDPantiSosial', $id)->get();

    //     return view('daftarKegiatanDonaturRelawan.searchPantiSosial', compact('pantiSosial', 'kegiatanDonasi', 'kegiatanRelawan'));
    // }
}
