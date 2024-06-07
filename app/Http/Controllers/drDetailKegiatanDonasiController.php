<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;


class drDetailKegiatanDonasiController extends Controller
{
    public function show($idKegiatanDonasi, $idDonaturRelawan)
    {
        // Ambil data kegiatan relawan berdasarkan ID
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        // Ambil data donatur/relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        return view('drDetailKegiatanDonasi', compact('kegiatanDonasi', 'donaturRelawan'));
    }
}
