<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiRelawan;


class RiwayatRelawanController extends Controller
{

    public function index(Request $request)
    {
        // Ambil ID dari request
        $id = $request->id;

        // Ambil data registrasi relawan beserta informasi relawan berdasarkan IDKegiatanRelawan
        $registrasiRelawan = RegistrasiRelawan::with('donaturRelawan')->where('IDKegiatanRelawan', $id)->get();

        // Format tanggal dan jam menjadi satu string dan tambahkan ke variabel baru
        foreach ($registrasiRelawan as $registrasi) {
            $tanggalKegiatan = date('Y-m-d', strtotime($registrasi->TanggalKegiatanMulaiRelawan)) . ' - ' . date('Y-m-d', strtotime($registrasi->TanggalKegiatanSelesaiRelawan));
            $waktuKegiatan = date('H:i', strtotime($registrasi->JamMulaiRelawan)) . ' - ' . date('H:i', strtotime($registrasi->JamSelesaiRelawan));
            $registrasi->setAttribute('tanggalKegiatan', $tanggalKegiatan);
            $registrasi->setAttribute('waktuKegiatan', $waktuKegiatan);
        }

        // Hitung jumlah relawan dengan status "Konfirmasi Diterima"
        $jumlahKonfirmasiDiterima = RegistrasiRelawan::where('StatusRegistrasiRelawan', 'Terima')->where('IDKegiatanRelawan', $id)->count();

        // Kirim data ke view beserta jumlah relawan yang telah dikonfirmasi
        return view('RiwayatRelawan', compact('registrasiRelawan', 'jumlahKonfirmasiDiterima'));
    }


    public function updateStatus(Request $request, $id)
    {
        $registrasi = RegistrasiRelawan::find($id);
        if ($registrasi) {
            // Ubah status berdasarkan tombol yang diklik
            if ($request->has('terima')) {
                $registrasi->StatusRegistrasiRelawan = 'Terima';
            } elseif ($request->has('tolak')) {
                $registrasi->StatusRegistrasiRelawan = 'Tolak';
            }
            $registrasi->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
    }


    public function updateStatusCheckbox(Request $request, $id)
{
    $registrasi = RegistrasiRelawan::find($id);
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
