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
        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->orderBy('created_at', 'desc')
            ->get();

        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->orderBy('created_at', 'desc')
            ->get();

        //Convert eloquent collections to base collections
        $kegiatanRelawanCollection = $kegiatanRelawan->toBase();
        $kegiatanDonasiCollection = $kegiatanDonasi->toBase();

        $merged = $kegiatanRelawanCollection->merge($kegiatanDonasiCollection);
        $sorted = $merged->sortByDesc('created_at');

        return view('generalPage', ['activities'=> $sorted]);
    }

    public function displayDummyProfilePage(){
        return view('dummyProfilePage');
    }

    public function viewAllKegiatanDonasi(){
        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('kegiatanDonasiPage', compact('kegiatanDonasi'));
    }

    public function viewAllKegiatanRelawan(){
        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('kegiatanRelawanPage', compact('kegiatanRelawan'));
    }

    public function search(Request $request){
        $search = $request->input('search');

        if ($search) {
            // Search Kegiatan Relawan
            $kegiatanRelawan = KegiatanRelawan::where('NamaKegiatanRelawan', 'like', "%$search%")
                ->orWhere('JenisKegiatanRelawan', 'like', "%$search%")
                ->withCount('registrasiRelawan')
                ->orderBy('created_at', 'desc')
                ->get();

            // Search Kegiatan Donasi
            $kegiatanDonasi = KegiatanDonasi::where('NamaKegiatanDonasi', 'like', "%$search%")
                ->orWhere('JenisDonasiDibutuhkan', 'like', "%$search%")
                ->withCount('registrasiDonatur')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
                ->orderBy('created_at', 'desc')
                ->get();

            $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $kegiatanRelawanCollection = $kegiatanRelawan->toBase();
        $kegiatanDonasiCollection = $kegiatanDonasi->toBase();

        $merged = $kegiatanRelawanCollection->merge($kegiatanDonasiCollection);
        $sorted = $merged->sortByDesc('created_at');

        // Determine which view to return based on search context
        $view = $request->input('view', 'generalPage');

        return view($view, ['activities' => $sorted]);

    }


}
