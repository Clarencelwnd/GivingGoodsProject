<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\RegistrasiDonatur;


class RegistrasiDonaturController extends Controller
{
    public function index()
    {
        // Ambil data registrasi donatur beserta informasi donatur
        $registrasiDonatur = RegistrasiDonatur::with('donaturRelawan')->get();

        // Format tanggal dan jam menjadi satu string
        foreach ($registrasiDonatur as $registrasi) {
            $tanggalDonasi = date('Y-m-d', strtotime($registrasi->TanggalDonasi));
            $jamDonasi = date('H:i', strtotime($registrasi->JamDonasi));
            $registrasi->setAttribute('jamTanggalDonasi', $tanggalDonasi . ' ' . $jamDonasi);
        }

        // Hitung jumlah donatur dengan status "Konfirmasi Diterima"
        $jumlahKonfirmasiDiterima = RegistrasiDonatur::where('StatusKegiatanRelawan', 'Konfirmasi Diterima')->count();

        // Kirim data ke view beserta jumlah donatur yang telah dikonfirmasi
        return view('RiwayatDonatur', compact('registrasiDonatur', 'jumlahKonfirmasiDiterima'));
    }



    public function updateStatus(Request $request, $id)
    {
        $registrasi = RegistrasiDonatur::find($id);
        if ($registrasi) {
            $registrasi->StatusKegiatanRelawan = 'Konfirmasi Diterima'; // Ubah status di sini
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }

}
