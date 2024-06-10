<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\RegistrasiDonatur;


class SummaryDaftarDonasiController extends Controller
{
    public function show(Request $request, $idKegiatanDonasi, $idDonaturRelawan)
    {
        // Cari data kegiatan relawan berdasarkan ID
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        // Cari data donatur relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        // Jika data kegiatan atau donatur tidak ditemukan, redirect kembali dengan pesan error
        if (!$kegiatanDonasi || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        // Ambil data dari session jika ada
        $data = $request->session()->get('daftar_donasi');

        // Kirim data ke view SummaryDaftarRelawan
        return view('SummaryDaftarDonasi', compact('kegiatanDonasi', 'donaturRelawan', 'data'));
    }


}
