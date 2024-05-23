<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\KegiatanDonasi;

class DetailKegiatanDonasiController extends Controller
{
    public function show($id)
    {
        $kegiatanDonasi = KegiatanDonasi::find($id);

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('DetailKegiatanDonasi', compact('kegiatanDonasi'));
    }
}
