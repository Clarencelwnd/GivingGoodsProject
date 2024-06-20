<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\PantiSosial;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PagePanSosController extends Controller
{
    public function show($IDPantiSosial, $IDDonaturRelawan)
    {
        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Mendapatkan informasi panti sosial berdasarkan ID
        $pantiSosial = PantiSosial::findOrFail($IDPantiSosial);

        // Mendapatkan informasi donatur/relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::findOrFail($IDDonaturRelawan);

        // Mengambil kegiatan relawan dengan ID Panti Sosial yang sesuai
        $kegiatanRelawan = KegiatanRelawan::where('IDPantiSosial', $IDPantiSosial)->get();

        // Mengambil kegiatan donasi dengan ID Panti Sosial yang sesuai
        $kegiatanDonasi = KegiatanDonasi::where('IDPantiSosial', $IDPantiSosial)->get();

        // Inisialisasi array kosong untuk $activities
        $activities = [];

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

        // Looping untuk menambahkan kegiatan relawan ke dalam $activities
        foreach ($kegiatanRelawan as $relawan) {
            $activities[] = (object) [
                'IDKegiatanRelawan' => $relawan->IDKegiatanRelawan,
                'NamaKegiatanRelawan' => $relawan->NamaKegiatanRelawan,
                'GambarKegiatan' => $relawan->GambarKegiatanRelawan,
                'JenisKegiatanRelawan' => $relawan->JenisKegiatanRelawan,
                'pantiSosial' => $pantiSosial,
            ];
        }

        // Looping untuk menambahkan kegiatan donasi ke dalam $activities
        foreach ($kegiatanDonasi as $donasi) {
            $activities[] = (object) [
                'IDKegiatanDonasi' => $donasi->IDKegiatanDonasi,
                'NamaKegiatanDonasi' => $donasi->NamaKegiatanDonasi,
                'GambarKegiatan' => $donasi->GambarKegiatanDonasi,
                'JenisDonasiDibutuhkan' => $donasi->JenisDonasiDibutuhkan,
                'pantiSosial' => $pantiSosial,
                'jenisDonasiIcons' => $jenisDonasiIcons,
            ];
        }

        // Mengubah array $activities menjadi koleksi dan mengurutkannya
        $activities = collect($activities);

        // Membuat paginasi
        $activities = new LengthAwarePaginator(
            $activities->forPage($currentPage, $perPage),
            $activities->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        // Variabel ID untuk keperluan customisasi di view
        $id = $IDDonaturRelawan;

        // Mengirimkan data ke view dengan compact
        return view('DetailPantiSosial.PagePanSos', compact('pantiSosial', 'donaturRelawan', 'activities', 'id'));
    }
}
