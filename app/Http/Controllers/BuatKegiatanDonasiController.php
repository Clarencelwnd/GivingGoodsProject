<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\KegiatanDonasi;

class BuatKegiatanDonasiController extends Controller
{

      // Menampilkan form buat kegiatan donasi
      public function show()
      {
          return view('BuatKegiatanDonasi');
      }


       // Menyimpan data kegiatan donasi ke database
       public function store(Request $request)
       {
           $request->validate([
               'namaKegiatan' => 'required|string|max:255',
               'deskripsiKegiatan' => 'required|string|max:255',
               'tglMulai' => 'required|date',
               'tglSelesai' => 'required|date',
               'jenisDonasi' => 'required|string|max:255',
               'deskripsiJenisDonasi' => 'required|string|max:255',
               'lokasiKegiatan' => 'required|string|max:255',
               'linkGoogleMaps' => 'required|string|max:255',
           ]);

           KegiatanDonasi::create([
               'IDPantiSosial' => 1, // Sesuaikan dengan IDPantiSosial yang sesuai
               'GambarKegiatanDonasi' => $request->fotoKegiatan,
               'NamaKegiatanDonasi' => $request->namaKegiatan,
               'DeskripsiKegiatanDonasi' => $request->deskripsiKegiatan,
               'JenisDonasiDibutuhkan' => $request->jenisDonasi,
               'TanggalKegiatanDonasiMulai' => $request->tglMulai,
               'TanggalKegiatanDonasiSelesai' => $request->tglSelesai,
               'DeskripsiJenisDonasi' => $request->deskripsiJenisDonasi,
               'LokasiKegiatanDonasi' => $request->lokasiKegiatan,
               'LinkGoogleMapsLokasiKegiatanDonasi' => $request->linkGoogleMaps,
               'StatusKegiatanDonasi' => 'Aktif', // Sesuaikan dengan status yang sesuai
           ]);

           return redirect()->route('home')->with('success', 'Kegiatan donasi berhasil dibuat.');
       }


}
