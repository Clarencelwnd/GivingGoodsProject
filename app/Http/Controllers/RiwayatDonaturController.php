<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiDonatur;


class RiwayatDonaturController extends Controller
{

    public function index(Request $request)
{
    // Ambil ID dari request
    $id = $request->id;

    // Ambil data registrasi donatur beserta informasi donatur berdasarkan ID
    $registrasiDonatur = RegistrasiDonatur::with('donaturRelawan')->where('IDKegiatanDonasi', $id)->get();

    // Format tanggal dan jam menjadi satu string
    foreach ($registrasiDonatur as $registrasi) {
        $tanggalDonasi = date('Y-m-d', strtotime($registrasi->TanggalDonasi));
        $jamDonasi = date('H:i', strtotime($registrasi->JamDonasi));
        $registrasi->setAttribute('jamTanggalDonasi', $tanggalDonasi . ' ' . $jamDonasi);
    }

    // Hitung jumlah donatur dengan status "Konfirmasi Diterima"
    $jumlahKonfirmasiDiterima = RegistrasiDonatur::where('StatusRegistrasiDonatur', 'Konfirmasi Diterima')->count();

    // Kirim data ke view beserta jumlah donatur yang telah dikonfirmasi
    return view('RiwayatDonatur', compact('registrasiDonatur', 'jumlahKonfirmasiDiterima', 'id'));
}




    public function updateStatus(Request $request, $id)
    {
        $registrasi = RegistrasiDonatur::find($id);
        if ($registrasi) {
            $registrasi->StatusRegistrasiDonatur = 'Konfirmasi Diterima'; // Ubah status di sini
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }


    public function updateStatusCheckbox(Request $request, $id)
    {
        $registrasi = RegistrasiDonatur::find($id);
        if ($registrasi) {
            // Periksa apakah checkbox sudah dicentang atau tidak
            $isChecked = $request->has('sudah_dihubungi');
            $status = $isChecked ? 'Sudah' : 'Belum';
            $registrasi->StatusDihubungi = $status;
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }


}
