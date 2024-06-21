<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\DonaturAtauRelawan;
use GuzzleHttp\Client;


class drDetailKegiatanRelawanController extends Controller
{

    public function show($idKegiatanRelawan, $idDonaturRelawan, $jarakKm)
    {
        // Ambil data kegiatan relawan berdasarkan ID
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

        // Jika kegiatan relawan tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        // Ambil data donatur/relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        // Jika donatur/relawan tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        // Variabel $id untuk keperluan customisasi di view
        $id = $idDonaturRelawan;

        // Mengirimkan data ke view beserta jarakKm jika ada
        return view('DetailKegiatanRelawan.drDetailKegiatanRelawan', compact('kegiatanRelawan', 'donaturRelawan', 'id', 'jarakKm'));
    }


}
