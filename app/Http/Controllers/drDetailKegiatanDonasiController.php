<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\RegistrasiDonatur;
use GuzzleHttp\Client;

class drDetailKegiatanDonasiController extends Controller
{
    public function show($idKegiatanDonasi, $idDonaturRelawan, $jarakKm)
    {
        // Temukan kegiatan donasi berdasarkan ID
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);
        $registrasiDonasi = RegistrasiDonatur::where('IDKegiatanDonasi', $idKegiatanDonasi)
                                               ->where('IDDonaturRelawan', $idDonaturRelawan)
                                               ->first();

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        // Temukan donatur atau relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);
        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        $id = $idDonaturRelawan;

        if($registrasiDonasi){
            $kegiatanDonasi->setAttribute('Disable', 'True');
        }
        else{
            $kegiatanDonasi->setAttribute('Disable', 'False');
        }

        return view('DetailKegiatanDonasi.drDetailKegiatanDonasi', compact('kegiatanDonasi', 'donaturRelawan', 'jarakKm', 'id'));
    }


}
