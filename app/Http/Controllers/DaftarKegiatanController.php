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
        $perPage = 9;
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

            $jenisDonasiList = ['Makanan', 'Pakaian', 'Keperluan_Mandi', 'Obat', 'Keperluan_Rumah', 'Buku', 'Alat_Tulis', 'Keperluan_Ibadah', 'Mainan'];
            $jenisRelawanList = ['Bencana_Alam', 'Pendidikan', 'Kesehatan', 'Lingkungan', 'Teknologi', 'Masyarakat', 'Darurat_Bencana', 'Seni_Budaya'];

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
            'activities'=> $paginator,
            'jenisDonasiIcons'=>$jenisDonasiIcons,
            'jenisDonasiList' => $jenisDonasiList,
            'jenisRelawanList' => $jenisRelawanList
        ]);
    }

    public function search(Request $request) {
        $search = $request->input('search');

        $pantiSosialIds = PantiSosial::where('NamaPantiSosial', 'like', '%' . $search . '%')->pluck('IDPantiSosial');

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

        $jenisDonasiList = ['Makanan', 'Pakaian', 'Keperluan_Mandi', 'Obat', 'Keperluan_Rumah', 'Buku', 'Alat_Tulis', 'Keperluan_Ibadah', 'Mainan'];
        $jenisRelawanList = ['Bencana_Alam', 'Pendidikan', 'Kesehatan', 'Lingkungan', 'Teknologi', 'Masyarakat', 'Darurat_Bencana', 'Seni_Budaya'];

        $kegiatanRelawanCollection = $kegiatanRelawan->toBase();
        $kegiatanDonasiCollection = $kegiatanDonasi->toBase();

        $merged = $kegiatanRelawanCollection->merge($kegiatanDonasiCollection);
        $sorted = $merged->sortByDesc('created_at');

        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginator = new LengthAwarePaginator($currentPageItems, $sorted->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
        // $paginator = new LengthAwarePaginator(
        //     $sorted->forPage($currentPage, $perPage),
        //     $sorted->count(),
        //     $perPage,
        //     $currentPage,
        //     ['path' => LengthAwarePaginator::resolveCurrentPath()]
        // );

        $view = $request->input('view', 'daftarKegiatanDonaturRelawan.daftarKegiatan');

        return view($view, [
            'activities' => $paginator,
            'jenisDonasiIcons' => $jenisDonasiIcons,
            'search' => $search,
            'jenisDonasiList' => $jenisDonasiList,
            'jenisRelawanList' => $jenisRelawanList
        ]);
    }

    private function addPaginationLinks($activities){
        $links = $activities->links();
        Paginator::useBootstrap();
        $links->withPath('');
        return $links;
    }
}
