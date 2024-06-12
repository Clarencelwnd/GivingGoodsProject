<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;


class drDetailKegiatanDonasiController extends Controller
{
    public function show($idKegiatanDonasi, $idDonaturRelawan)
    {
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        return view('drDetailKegiatanDonasi', compact('kegiatanDonasi', 'donaturRelawan'));
    }
}
