<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\DonaturAtauRelawan;


class drDetailKegiatanRelawanController extends Controller
{
    public function show($idKegiatanRelawan, $idDonaturRelawan)
    {
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        return view('drDetailKegiatanRelawan', compact('kegiatanRelawan', 'donaturRelawan'));
    }
}
