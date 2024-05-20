<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Post;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use Carbon\Carbon;
use App\Http\Controllers\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;

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

        // $merge = $kegiatanRelawan->merge($kegiatanDonasi);
        // $sorted = $merge->sortByDesc('created_at');

        // $perPage = 5;
        // $currentPage = PaginationLengthAwarePaginator::resolveCurrentPage();
        // $currentPageItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->all();
        // $paginatedCollection = new PaginationLengthAwarePaginator($currentPageItems, $sorted->count(), $perPage);

        return view('generalPage', compact('kegiatanRelawan', 'kegiatanDonasi'));
        // return view('generalPage', ['sorted' => $paginatedCollection]);
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
                ->orderBy('created_at', 'desc')
                ->get();

            // Search Kegiatan Donasi
            $kegiatanDonasi = KegiatanDonasi::where('NamaKegiatanDonasi', 'like', "%$search%")
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

        // Determine which view to return based on search context
        $view = $request->input('view', 'generalPage');

        return view($view, compact('kegiatanRelawan', 'kegiatanDonasi', 'search'));
    }


}
