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

    public function showEdit($id)
    {
        $kegiatanDonasi = KegiatanDonasi::find($id);

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('UbahKegiatanDonasi', compact('kegiatanDonasi'));
    }



    public function update(Request $request, $id)
{
    $kegiatanDonasi = KegiatanDonasi::find($id);

    if (!$kegiatanDonasi) {
        return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
    }

    // Perbarui data kegiatan donasi
    $kegiatanDonasi->NamaKegiatanDonasi = $request->input('namaKegiatan');
    $kegiatanDonasi->DeskripsiKegiatanDonasi = $request->input('deskripsiKegiatan');
    $kegiatanDonasi->TanggalKegiatanDonasiMulai = $request->input('tglMulai');
    $kegiatanDonasi->TanggalKegiatanDonasiSelesai = $request->input('tglSelesai');
    $kegiatanDonasi->JenisDonasiDibutuhkan = $request->input('jenisDonasi');
    $kegiatanDonasi->DeskripsiJenisDonasi = $request->input('deskripsiJenisDonasi');
    $kegiatanDonasi->LokasiKegiatanDonasi = $request->input('lokasiKegiatan');
    $kegiatanDonasi->LinkGoogleMapsLokasiKegiatanDonasi = $request->input('linkGoogleMaps');

    $kegiatanDonasi->save();

    return redirect()->route('kegiatan-donasi.show', ['id' => $id])->with('success', 'Perubahan berhasil disimpan');
}



    public function destroy($id)
    {
        $kegiatanDonasi = KegiatanDonasi::findOrFail($id);
        $kegiatanDonasi->delete();

        return redirect()->route('kegiatan-donasi.index')->with('success', 'Kegiatan Donasi berhasil dihapus.');
    }
}
