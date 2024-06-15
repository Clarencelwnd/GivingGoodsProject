<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class generalPageController extends Controller
{
    public function displayGeneralPage($id){
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

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

        $paginator = new LengthAwarePaginator(
            $sorted->forPage($currentPage, $perPage),
            $sorted->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return view('generalPage', ['activities'=> $paginator, 'id'=>$id]);
    }

    public function displayDummyProfilePage(){
        return view('dummyPages.dummyProfilePage');
    }

    public function viewAllKegiatanDonasi(){
        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('kegiatanDonasiPage', compact('kegiatanDonasi'));
    }

    public function viewAllKegiatanRelawan(){
        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
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


        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginator = new LengthAwarePaginator($currentPageItems, $sorted->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        // Determine which view to return based on search context
        $view = $request->input('view', 'generalPage');

        return view($view, ['activities' => $paginator]);
    }

    public function filterStatusKegiatan(Request $request){
        $status = $request->input('status');
        $today = Carbon::today();

        $kegiatanRelawan = KegiatanRelawan::query();
        $kegiatanDonasi = KegiatanDonasi::query();

        if($status == 'Akan Datang'){
            $kegiatanRelawan->whereDate('TanggalKegiatanRelawanMulai', '>', $today);
            $kegiatanDonasi->whereDate('TanggalKegiatanDonasiMulai', '>', $today);

        } else if ($status == 'Selesai'){
            $kegiatanRelawan->whereDate('TanggalKegiatanRelawanMulai', '<', $today);
            $kegiatanDonasi->whereDate('TanggalKegiatanDonasiMulai', '<', $today);

        } else if($status == 'Sedang Berlangsung'){
            $kegiatanRelawan->where(function ($query) use ($today) {
                $query->whereDate('TanggalKegiatanRelawanMulai', '<=', $today)
                      ->whereDate('TanggalKegiatanRelawanSelesai', '>=', $today);
            });
            $kegiatanDonasi->where(function ($query) use ($today) {
                $query->whereDate('TanggalKegiatanDonasiMulai', '<=', $today)
                      ->whereDate('TanggalKegiatanDonasiSelesai', '>=', $today);
            });
        }

        if ($request->is('viewAllKegiatanRelawan')) {
            $kegiatanRelawan = $kegiatanRelawan->withCount('registrasiRelawan')->get();
            return view('kegiatanRelawanPage', compact('kegiatanRelawan'));

        } else if ($request->is('viewAllKegiatanDonasi')) {
            $kegiatanDonasi = $kegiatanDonasi->withCount('registrasiDonatur')->get();
            return view('kegiatanDonasiPage', compact('kegiatanDonasi'));

        } else {
            $kegiatanRelawan = $kegiatanRelawan->withCount('registrasiRelawan')->get();
            $kegiatanDonasi = $kegiatanDonasi->withCount('registrasiDonatur')->get();
            $activities = $kegiatanRelawan->merge($kegiatanDonasi);
            return view('generalPage', compact('activities'));
        }

    }

    private function addPaginationLinks($activities){
        $links = $activities->links();
        Paginator::useBootstrap();
        $links->withPath('');
        return $links;
    }


}
