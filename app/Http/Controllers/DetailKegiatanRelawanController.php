<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;

class DetailKegiatanRelawanController extends Controller
{
    public function show($idKegiatanRelawan, $idPantiSosial)
    {
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

        $id = $idPantiSosial;

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('KegiatanRelawanPantiSosial.DetailKegiatanRelawan', compact('kegiatanRelawan', 'idKegiatanRelawan', 'id'));
    }

    public function showEdit($idKegiatanRelawan, $idPantiSosial)
    {
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

        $id = $idPantiSosial;

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('KegiatanRelawanPantiSosial.UbahKegiatanRelawan', compact('kegiatanRelawan', 'idKegiatanRelawan', 'id'));
    }


    public function update(Request $request, $idKegiatanRelawan, $idPantiSosial)
    {
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        // Perbarui data kegiatan relawan
        $kegiatanRelawan->DeskripsiKegiatanRelawan = $request->input('deskripsiKegiatan');
        $kegiatanRelawan->JenisKegiatanRelawan = $request->input('jenisRelawan');
        $kegiatanRelawan->TanggalKegiatanRelawanMulai = $request->input('tglMulai');
        $kegiatanRelawan->TanggalKegiatanRelawanSelesai = $request->input('tglSelesai');
        $kegiatanRelawan->TanggalPendaftaranKegiatanDitutup = $request->input('tglDitutup');
        $kegiatanRelawan->JumlahRelawanDibutuhkan = $request->input('jumlahRelawan');
        $kegiatanRelawan->LokasiKegiatanRelawan = $request->input('lokasiKegiatan');
        $kegiatanRelawan->LinkGoogleMapsLokasiKegiatanRelawan = $request->input('lokasiGoogleMaps');
        $kegiatanRelawan->JamMulaiKegiatanRelawan = $request->input('jamMulai');
        $kegiatanRelawan->JamSelesaiKegiatanRelawan = $request->input('jamSelesai');
        $kegiatanRelawan->KriteriaRelawan = $request->input('kriteriaRelawan');
        $kegiatanRelawan->SyaratDanInstruksiKegiatanRelawan = $request->input('persyaratanInstruksi');

        $kegiatanRelawan->save();

        $id = $idPantiSosial;

        return redirect()->route('kegiatan-relawan.show', ['idKegiatanRelawan' => $idKegiatanRelawan, 'idPantiSosial' => $id])->with('success', 'Perubahan berhasil disimpan');
    }


    public function destroy($idKegiatanRelawan, $idPantiSosial)
    {
        $kegiatanRelawan = KegiatanRelawan::where('IDKegiatanRelawan', $idKegiatanRelawan)->where('IDPantiSosial', $idPantiSosial)->first();

        $kegiatanRelawan->delete();

        return redirect()->route('viewAllKegiatan', ['id' => $idPantiSosial])->with('success', 'Kegiatan Relawan berhasil dihapus.');
    }
}
