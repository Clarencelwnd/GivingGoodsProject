<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Post;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use PhpParser\Node\Expr\PostDec;

class generalPageController extends Controller
{
    // NOT USED
    // public function displayTemplatePage(){
    //     return view('templatePage');
    // }

    public function displayGeneralPage(){
        $kegiatanRelawan = KegiatanRelawan::all();
        $kegiatanDonasi = KegiatanDonasi::all();
        return view('generalPage', compact('kegiatanRelawan', 'kegiatanDonasi'));
    }

    public function displayDummyProfilePage(){
        return view('dummyProfilePage');
    }

    public function viewAllKegiatanDonasi(){
        // $kegiatan_donasi = DB::table('kegiatan_donasi')->get();
        $kegiatanDonasi = KegiatanDonasi::all();
        return view('kegiatanDonasiPage', compact('kegiatanDonasi'));
    }

    public function viewAllKegiatanRelawan(){
        // $kegiatan_donasi = DB::table('kegiatan_donasi')->get();
        $kegiatanRelawan = KegiatanRelawan::all();
        return view('kegiatanRelawanPage', compact('kegiatanRelawan'));
    }

    public function search(Request $request){
        $search = $request->input('search');

        if ($search) {
            // Search Kegiatan Relawan
            $kegiatanRelawan = KegiatanRelawan::where('NamaKegiatanRelawan', 'like', "%$search%")
                ->orWhere('JenisKegiatanRelawan', 'like', "%$search%")
                ->get();

            // Search Kegiatan Donasi
            $kegiatanDonasi = KegiatanDonasi::where('NamaKegiatanDonasi', 'like', "%$search%")
                ->orWhere('JenisDonasiDibutuhkan', 'like', "%$search%")
                ->get();
        } else {
            $kegiatanRelawan = KegiatanRelawan::all();
            $kegiatanDonasi = KegiatanDonasi::all();
        }

        // Determine which view to return based on search context
        $view = $request->input('view', 'generalPage');
        return view($view, compact('kegiatanRelawan', 'kegiatanDonasi', 'search'));
        
        // return view('generalPage', compact('kegiatanRelawan', 'kegiatanDonasi', 'search'));
    }


}
