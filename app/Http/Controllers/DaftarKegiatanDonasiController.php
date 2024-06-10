<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;


class DaftarKegiatanDonasiController extends Controller
{
    public function show($idKegiatanDonasi, $idDonaturRelawan)
    {
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);

        if (!$kegiatanDonasi || !$donaturRelawan) {
            return redirect()->back()->with('error', 'Kegiatan atau Donatur tidak ditemukan');
        }

        // Kemudian Anda bisa melakukan operasi yang diperlukan dengan data yang Anda miliki

        return view('DaftarKegiatanDonasi', compact('kegiatanDonasi', 'donaturRelawan'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_donatur' => 'required',
            'no_hp_donatur' => 'required',
            'jenis_donasi' => 'required',
            'deskripsi_barang_donasi' => 'required',
            'pengiriman_barang' => 'required',
            'tanggal_kegiatan' => 'required',
            'jam_mulai_kegiatan' => 'required',
            'jam_selesai_kegiatan' => 'required',
        ]);

        // Simpan data ke dalam session
        $request->session()->put('daftar_donasi', $validatedData);

        return redirect()->route('summaryDaftarDonasi', [
            'idKegiatanDonasi' => $request->IDKegiatanDonasi,
            'idDonaturRelawan' => $request->IDDonaturRelawan
        ]);

    }



}
