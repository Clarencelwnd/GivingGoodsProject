<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use App\Models\PantiSosial;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DaftarKegiatanController extends Controller
{

    public function displaySideBar(){
        return view('components.filterSideBar');
    }
    
    public function displayDaftarKegiatan(){
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->orderBy('created_at', 'desc')
            ->get();

        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->orderBy('created_at', 'desc')
            ->get();

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

        return view('daftarKegiatanDonaturRelawan.daftarKegiatan', ['activities'=> $paginator, 'jenisDonasiIcons'=>$jenisDonasiIcons]);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Search based on panti sosial IDs
        $pantiSosialIds = PantiSosial::where('NamaPantiSosial', 'like', '%' . $search . '%')->pluck('IDPantiSosial');

        // Fetch activities based on the search query
        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->where('NamaKegiatanRelawan', 'like', '%' . $search . '%')
            ->orWhereIn('IDPantiSosial', $pantiSosialIds)
            ->orWhere('JenisKegiatanRelawan', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->where('NamaKegiatanDonasi', 'like', '%' . $search . '%')
            ->orWhereIn('IDPantiSosial', $pantiSosialIds)
            ->orWhere('JenisDonasiDibutuhkan', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->get();

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

        return view('daftarKegiatanDonaturRelawan.daftarKegiatan', [
            'activities' => $paginator,
            'jenisDonasiIcons' => $jenisDonasiIcons,
            'search' => $search // to preserve the search query in the view
        ]);
    }

}
