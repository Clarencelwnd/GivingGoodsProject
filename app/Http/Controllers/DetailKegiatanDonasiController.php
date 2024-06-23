<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;

class DetailKegiatanDonasiController extends Controller{
    public function show($idKegiatanDonasi, $idPantiSosial){
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        $id = $idPantiSosial;

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('KegiatanDonasiPantiSosial.DetailKegiatanDonasi', compact('kegiatanDonasi', 'idKegiatanDonasi' , 'id'));
    }

    public function showEdit($idKegiatanDonasi, $idPantiSosial){
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);

        $id = $idPantiSosial;

        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('KegiatanDonasiPantiSosial.UbahKegiatanDonasi', compact('kegiatanDonasi', 'idKegiatanDonasi', 'id'));
    }

    public function update(Request $request, $idKegiatanDonasi, $idPantiSosial){
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);
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

        $id = $idPantiSosial;

        return redirect()->route('kegiatan-donasi.show', ['idKegiatanDonasi' => $idKegiatanDonasi, 'idPantiSosial' => $id])->with('success', 'Perubahan berhasil disimpan');
    }

    public function destroy($idKegiatanDonasi, $idPantiSosial){
        $kegiatanDonasi = KegiatanDonasi::where('IDKegiatanDonasi', $idKegiatanDonasi)->where('IDPantiSosial', $idPantiSosial)->first();
        $kegiatanDonasi->delete();

        return redirect()->route('viewAllKegiatan', ['id' => $idPantiSosial])->with('success', 'Kegiatan Donasi berhasil dihapus.');
    }
}
