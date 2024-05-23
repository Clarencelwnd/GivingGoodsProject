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



    public function destroy($id)
    {
        $kegiatanDonasi = KegiatanDonasi::findOrFail($id);
        $kegiatanDonasi->delete();

        return redirect()->route('kegiatan-donasi.index')->with('success', 'Kegiatan Donasi berhasil dihapus.');
    }
}
