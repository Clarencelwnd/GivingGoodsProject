<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Post;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class generalPageController extends Controller
{
    // NOT USED
    // public function displayTemplatePage(){
    //     return view('templatePage');
    // }

    public function displayGeneralPage(){
        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $kegiatanRelawanCollection = $kegiatanRelawan->toBase();
        $kegiatanDonasiCollection = $kegiatanDonasi->toBase();

        $merged = $kegiatanRelawanCollection->merge($kegiatanDonasiCollection);
        $sorted = $merged->sortByDesc('created_at');

         // Paginate the sorted collection with 5 items per page
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $perPage = 5;
        // $currentPageItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->all();
        // $paginated = new LengthAwarePaginator($currentPageItems, $sorted->count(), $perPage, $currentPage);

        return view('generalPage', ['activities' => $sorted]);
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
            $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
                ->where('NamaKegiatanRelawan', 'like', "%$search%")
                ->orWhere('JenisKegiatanRelawan', 'like', "%$search%")
                ->orderBy('created_at', 'desc')
                ->get();

            // Search Kegiatan Donasi
            $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
                ->where('NamaKegiatanDonasi', 'like', "%$search%")
                ->orWhere('JenisDonasiDibutuhkan', 'like', "%$search%")
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

    public function displayStatusKegiatan(){
        return view('components.statusKegiatan');
    }


}
