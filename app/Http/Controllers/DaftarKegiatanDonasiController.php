<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;


class DaftarKegiatanDonasiController extends Controller
{
    public function show($idKegiatanDonasi, $idDonaturRelawan)
    {
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$kegiatanDonasi || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        // Kemudian Anda bisa melakukan operasi yang diperlukan dengan data yang Anda miliki

        return view('DaftarKegiatanDonasi', compact('kegiatanDonasi', 'donaturRelawan'));
    }




}
