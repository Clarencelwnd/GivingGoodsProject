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

        // dd($registrasiDonatur);

        // Kirim data ke view
        return view('RiwayatDonatur', compact('registrasiDonatur'));
    }
}
