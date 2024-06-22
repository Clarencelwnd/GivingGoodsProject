<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;

class DetailKegiatanRelawanController extends Controller
{
    public function show($id)
    {
        $kegiatanRelawan = KegiatanRelawan::find($id);

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('KegiatanRelawanPantiSosial.DetailKegiatanRelawan', compact('kegiatanRelawan', 'id'));
    }

    public function showEdit($id)
    {
        $kegiatanRelawan = KegiatanRelawan::find($id);

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('KegiatanRelawanPantiSosial.UbahKegiatanRelawan', compact('kegiatanRelawan', 'id'));
    }


    public function update(Request $request, $id)
    {
        $kegiatanRelawan = KegiatanRelawan::find($id);

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

        return redirect()->route('kegiatan-relawan.show', ['id' => $id])->with('success', 'Perubahan berhasil disimpan');
    }


    public function destroy($id)
    {
        $kegiatanRelawan = KegiatanRelawan::findOrFail($id);
        $kegiatanRelawan->delete();

        return redirect()->route('kegiatan-relawan.show', ['id' => $id])->with('success', 'Kegiatan relawan berhasil dihapus.');
    }
}
