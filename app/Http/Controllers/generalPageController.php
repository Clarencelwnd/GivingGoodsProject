<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use App\Models\PantiSosial;
use App\Models\RegistrasiDonatur;
use App\Models\RegistrasiRelawan;
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
            ->where('IDPantiSosial', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->where('IDPantiSosial', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $FotoDonasi = [
            'pakaian' => 'Image/donasi/pakaian.png',
            'sepatu' => 'Image/donasi/sepatu.png',
            'mainan' => 'Image/donasi/mainan.png',
            'keperluan_ibadah' => 'Image/donasi/keperluan_ibadah.png',
            'buku' => 'Image/donasi/buku.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'keperluan_mandi' => 'Image/donasi/keperluan_mandi.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'alat_tulis' => 'Image/donasi/alat_tulis.png'
        ];
        foreach ($kegiatanDonasi as $donasi) {
            $partitionTanggalDonasiMulai = explode('-', $donasi->TanggalKegiatanDonasiMulai);
            $partitionTanggalDonasiSelesai = explode('-', $donasi->TanggalKegiatanDonasiSelesai);
            $donasi->setAttribute('TanggalDonasi', $partitionTanggalDonasiMulai[2] . ' ' . $bulan[$partitionTanggalDonasiMulai[1]] . ' ' . $partitionTanggalDonasiMulai[0] .
            ' - ' . $partitionTanggalDonasiSelesai[2] . ' ' . $bulan[$partitionTanggalDonasiSelesai[1]] . ' ' . $partitionTanggalDonasiMulai[0]);

            $partitionTanggalDanJamBuatDonasi = explode(' ', $donasi->created_at);
            $partitionTanggalBuatDonasi = explode('-', $partitionTanggalDanJamBuatDonasi[0]);
            $donasi->setAttribute('TanggalDanJamBuatDonasi', $partitionTanggalBuatDonasi[2] . ' ' . $bulan[$partitionTanggalBuatDonasi[1]] . ' ' . $partitionTanggalBuatDonasi[0] .
            ' (' . $partitionTanggalDanJamBuatDonasi[1] . ')');

            $donasiItems = explode(',', $donasi->JenisDonasiDibutuhkan);
            $donasi->setAttribute('donasiDanGambar', array_map(function($jenis) use ($FotoDonasi){
                return[
                    'jenis' => $jenis,
                    'image' => $FotoDonasi[$jenis],
                ];
            }, $donasiItems));


        }
        foreach ($kegiatanRelawan as $relawan) {
            $partitionTanggalRelawanMulai = explode('-', $relawan->TanggalKegiatanRelawanMulai);
            $partitionTanggalRelawanSelesai = explode('-', $relawan->TanggalKegiatanRelawanSelesai);
            $relawan->setAttribute('TanggalRelawan', $partitionTanggalRelawanMulai[2] . ' ' . $bulan[$partitionTanggalRelawanMulai[1]] . ' ' . $partitionTanggalRelawanMulai[0] .
            ' - ' . $partitionTanggalRelawanSelesai[2] . ' ' . $bulan[$partitionTanggalRelawanSelesai[1]] . ' ' . $partitionTanggalRelawanMulai[0]);

            $partitionTanggalDanJamBuatRelawan = explode(' ', $relawan->created_at);
            $partitionTanggalBuatRelawan = explode('-', $partitionTanggalDanJamBuatRelawan[0]);
            $relawan->setAttribute('TanggalDanJamBuatRelawan', $partitionTanggalBuatRelawan[2] . ' ' . $bulan[$partitionTanggalBuatRelawan[1]] . ' ' . $partitionTanggalBuatRelawan[0] .
            ' (' .  $partitionTanggalDanJamBuatRelawan[1] . ')');

            $partitionTanggalTutupRelawan = explode('-', $relawan->TanggalPendaftaranKegiatanDitutup);
            $relawan->setAttribute('TanggalTutupRelawan', $partitionTanggalTutupRelawan[2] . ' ' . $bulan[$partitionTanggalTutupRelawan[1]] . ' ' . $partitionTanggalTutupRelawan[0]);
        }

        //Convert eloquent collections to base collections
        $kegiatanRelawanCollection = $kegiatanRelawan->toBase();
        $kegiatanDonasiCollection = $kegiatanDonasi->toBase();

        $merged = $kegiatanRelawanCollection->merge($kegiatanDonasiCollection);
        $sorted = $merged->sortByDesc('created_at');

        foreach ($sorted as $kegiatan) {

            if ($kegiatan instanceof KegiatanRelawan) {
                $count = RegistrasiRelawan::where('IDKegiatanRelawan', $kegiatan->IDKegiatanRelawan)
                    ->where('StatusRegistrasiRelawan', 'Menunggu Konfirmasi')
                    ->count();
            } else {
                $count = RegistrasiDonatur::where('IDKegiatanDonasi', $kegiatan->IDKegiatanDonasi)
                    ->where('StatusRegistrasiDonatur', 'Menunggu Konfirmasi')
                    ->count();
            }

            $kegiatan->setAttribute('count', $count);
        }

        $paginator = new LengthAwarePaginator(
            $sorted->forPage($currentPage, $perPage),
            $sorted->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return view('GeneralPagePantiSosial.generalPage', ['activities'=> $paginator, 'id'=>$id]);
    }

    public function viewAllKegiatanDonasi($id){
        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->where('IDPantiSosial', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $FotoDonasi = [
            'pakaian' => 'Image/donasi/pakaian.png',
            'sepatu' => 'Image/donasi/sepatu.png',
            'mainan' => 'Image/donasi/mainan.png',
            'keperluan_ibadah' => 'Image/donasi/keperluan_ibadah.png',
            'buku' => 'Image/donasi/buku.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'keperluan_mandi' => 'Image/donasi/keperluan_mandi.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'alat_tulis' => 'Image/donasi/alat_tulis.png'
        ];
        foreach ($kegiatanDonasi as $donasi) {
            $partitionTanggalDonasiMulai = explode('-', $donasi->TanggalKegiatanDonasiMulai);
            $partitionTanggalDonasiSelesai = explode('-', $donasi->TanggalKegiatanDonasiSelesai);
            $donasi->setAttribute('TanggalDonasi', $partitionTanggalDonasiMulai[2] . ' ' . $bulan[$partitionTanggalDonasiMulai[1]] . ' ' . $partitionTanggalDonasiMulai[0] .
            ' - ' . $partitionTanggalDonasiSelesai[2] . ' ' . $bulan[$partitionTanggalDonasiSelesai[1]] . ' ' . $partitionTanggalDonasiMulai[0]);

            $partitionTanggalDanJamBuatDonasi = explode(' ', $donasi->created_at);
            $partitionTanggalBuatDonasi = explode('-', $partitionTanggalDanJamBuatDonasi[0]);
            $donasi->setAttribute('TanggalDanJamBuatDonasi', $partitionTanggalBuatDonasi[2] . ' ' . $bulan[$partitionTanggalBuatDonasi[1]] . ' ' . $partitionTanggalBuatDonasi[0] .
            ' (' . $partitionTanggalDanJamBuatDonasi[1] . ')');

            $donasiItems = explode(',', $donasi->JenisDonasiDibutuhkan);
            $donasi->setAttribute('donasiDanGambar', array_map(function($jenis) use ($FotoDonasi){
                return[
                    'jenis' => $jenis,
                    'image' => $FotoDonasi[$jenis],
                ];
            }, $donasiItems));

            $count = RegistrasiDonatur::where('IDKegiatanDonasi', $donasi->IDKegiatanDonasi)
                    ->where('StatusRegistrasiDonatur', 'Menunggu Konfirmasi')
                    ->count();
            $donasi->setAttribute('count', $count);
        }

        return view('KegiatanDonasiPantiSosial.kegiatanDonasiPage', compact('kegiatanDonasi', 'id'));
    }

    public function viewAllKegiatanRelawan($id){
        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
            ->where('IDPantiSosial', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        foreach ($kegiatanRelawan as $relawan) {
            $partitionTanggalRelawanMulai = explode('-', $relawan->TanggalKegiatanRelawanMulai);
            $partitionTanggalRelawanSelesai = explode('-', $relawan->TanggalKegiatanRelawanSelesai);
            $relawan->setAttribute('TanggalRelawan', $partitionTanggalRelawanMulai[2] . ' ' . $bulan[$partitionTanggalRelawanMulai[1]] . ' ' . $partitionTanggalRelawanMulai[0] .
            ' - ' . $partitionTanggalRelawanSelesai[2] . ' ' . $bulan[$partitionTanggalRelawanSelesai[1]] . ' ' . $partitionTanggalRelawanMulai[0]);

            $partitionTanggalDanJamBuatRelawan = explode(' ', $relawan->created_at);
            $partitionTanggalBuatRelawan = explode('-', $partitionTanggalDanJamBuatRelawan[0]);
            $relawan->setAttribute('TanggalDanJamBuatRelawan', $partitionTanggalBuatRelawan[2] . ' ' . $bulan[$partitionTanggalBuatRelawan[1]] . ' ' . $partitionTanggalBuatRelawan[0] .
            ' (' .  $partitionTanggalDanJamBuatRelawan[1] . ')');

            $partitionTanggalTutupRelawan = explode('-', $relawan->TanggalPendaftaranKegiatanDitutup);
            $relawan->setAttribute('TanggalTutupRelawan', $partitionTanggalTutupRelawan[2] . ' ' . $bulan[$partitionTanggalTutupRelawan[1]] . ' ' . $partitionTanggalTutupRelawan[0]);

            $count = RegistrasiRelawan::where('IDKegiatanRelawan', $relawan->IDKegiatanRelawan)
                    ->where('StatusRegistrasiRelawan', 'Menunggu Konfirmasi')
                    ->count();
            $relawan->setAttribute('count', $count);
        }

        return view('KegiatanRelawanPantiSosial.kegiatanRelawanPage', compact('kegiatanRelawan', 'id'));
    }

    public function search(Request $request, $id){
        $search = $request->input('search');

        if ($search) {
            // Search Kegiatan Relawan
            $kegiatanRelawan = KegiatanRelawan::where('IDPantiSosial', $id)
                ->where(function($query) use ($search){
                    $query->where('NamaKegiatanRelawan', 'like', "%$search%")
                          ->orWhere('JenisKegiatanRelawan', 'like', "%$search%");
                })
                ->withCount('registrasiRelawan')
                ->orderBy('created_at', 'desc')
                ->get();

            // Search Kegiatan Donasi
            $kegiatanDonasi = KegiatanDonasi::where('IDPantiSosial', $id)
                ->where(function($query) use ($search){
                    $query->where('NamaKegiatanDonasi', 'like', "%$search%")
                          ->orWhere('JenisDonasiDibutuhkan', 'like', "%$search%");
                })
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
        $view = $request->input('view', 'GeneralPagePantiSosial.generalPage');

        return view($view, ['activities' => $paginator, 'id' => $id]);
    }

    public function filterStatusKegiatan(Request $request, $id){
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
            return view('kegiatanRelawanPage', compact('kegiatanRelawan', ['id' => $id]));

        } else if ($request->is('viewAllKegiatanDonasi')) {
            $kegiatanDonasi = $kegiatanDonasi->withCount('registrasiDonatur')->get();
            return view('kegiatanDonasiPage', compact('kegiatanDonasi', ['id' => $id]));

        } else {
            $kegiatanRelawan = $kegiatanRelawan->withCount('registrasiRelawan')->get();
            $kegiatanDonasi = $kegiatanDonasi->withCount('registrasiDonatur')->get();
            $activities = $kegiatanRelawan->merge($kegiatanDonasi);
            return view('GeneralPagePantiSosial.generalPage', compact('activities', ['id' => $id]));
        }
    }

    private function addPaginationLinks($activities){
        $links = $activities->links();
        Paginator::useBootstrap();
        $links->withPath('');
        return $links;
    }

    public function faq($id){
        return view('FAQ.FAQ', compact('id'));
    }
}
