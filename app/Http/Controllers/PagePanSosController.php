<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\PantiSosial;


class PagePanSosController extends Controller
{

    public function show($IDPantiSosial, $IDDonaturRelawan)
    {
        $pantiSosial = PantiSosial::findOrFail($IDPantiSosial);
        $donaturRelawan = DonaturAtauRelawan::findOrFail($IDDonaturRelawan);

        // Mengambil kegiatan relawan dengan IDPantiSosial yang sesuai
        $kegiatanRelawan = KegiatanRelawan::where('IDPantiSosial', $IDPantiSosial)->get();

        // Mengambil kegiatan donasi dengan IDPantiSosial yang sesuai
        $kegiatanDonasi = KegiatanDonasi::where('IDPantiSosial', $IDPantiSosial)->get();

        return view('DetailPantiSosial.PagePanSos', compact('pantiSosial', 'donaturRelawan', 'kegiatanRelawan', 'kegiatanDonasi'));
    }


}
