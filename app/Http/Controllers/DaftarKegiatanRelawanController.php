<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\DonaturAtauRelawan;


class DaftarKegiatanRelawanController extends Controller
{
    public function show($idKegiatanRelawan, $idDonaturRelawan)
    {
        $kegiatanRelawan = KegiatanRelawan::find($idKegiatanRelawan);
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$kegiatanRelawan || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        return view('DaftarKegiatan.DaftarKegiatanRelawan', compact('kegiatanRelawan', 'donaturRelawan'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_relawan' => 'required',
            'no_hp_relawan' => 'required',
            'alasan_relawan' => 'required',
            'tanggal_kegiatan' => 'required',
        ]);

        // Simpan data ke dalam session
        $request->session()->put('daftar_relawan', $validatedData);

        return redirect()->route('summaryDaftarRelawan', [
            'idKegiatanRelawan' => $request->IDKegiatanRelawan,
            'idDonaturRelawan' => $request->IDDonaturRelawan
        ]);

    }

}
