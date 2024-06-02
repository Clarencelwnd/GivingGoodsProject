<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\KegiatanRelawan;

class BuatKegiatanRelawanController extends Controller
{

      // Menampilkan form buat kegiatan donasi
      public function show()
      {
          return view('BuatKegiatanRelawan');
      }


       // Menyimpan data kegiatan donasi ke database
       public function store(Request $request)
       {
        $validatedData = $request->validate([
               'namaKegiatan' => 'required|string|max:255',
               'deskripsiKegiatan' => 'required|string|max:255',
               'tglMulai' => 'required|date',
               'tglSelesai' => 'required|date',
               'pendaftaranTutup' => 'required|date',
               'jamMulai' => 'required|string',
               'jamSelesai' => 'required|string',
               'jmlhRelawanDibutuhkan' => 'required|integer',
               'lokasiKegiatan' => 'required|string|max:255',
               'linkGoogleMaps' => 'required|string|max:255',
               'fotoKegiatan' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
               'kriteriaRelawan' => 'required|string|max:255',
               'persyaratan' => 'required|string|max:255',
               'kontakSpesifik' => 'required|string|max:255',
               'jenisRelawan' => 'required|string|max:255',
           ]);

           $fotoKegiatanUrl = null;
           if ($request->hasFile('fotoKegiatan')) {
               $file = $request->file('fotoKegiatan');
               $fileName = time() . '_' . $file->getClientOriginalName();
               $file->storeAs('uploads', $fileName, 'public');

               // Mendapatkan URL gambar
               $fotoKegiatanUrl = asset('storage/uploads/' . $fileName);
           }

              // Cek apakah data valid atau tidak
    if ($validatedData) {
        KegiatanRelawan::create([
            'IDPantiSosial' => 1, // Sesuaikan dengan IDPantiSosial yang sesuai
            'GambarKegiatanRelawan' => $fotoKegiatanUrl,
            'NamaKegiatanRelawan' => $request->namaKegiatan,
            'DeskripsiKegiatanRelawan' => $request->deskripsiKegiatan,
            'JenisKegiatanRelawan' => $request->jenisRelawan,
            'TanggalKegiatanRelawanMulai' => $request->tglMulai,
            'TanggalKegiatanRelawanSelesai' => $request->tglSelesai,
            'TanggalPendaftaranKegiatanDitutup' => $request->pendaftaranTutup,
            'JamMulaiKegiatanRelawan' => $request->jamMulai,
            'JamSelesaiKegiatanRelawan' => $request->jamSelesai,
            'JumlahRelawanDibutuhkan' => $request->jmlhRelawanDibutuhkan,
            'LokasiKegiatanRelawan' => $request->lokasiKegiatan,
            'LinkGoogleMapsLokasiKegiatanRelawan' => $request->linkGoogleMaps,
            'KriteriaRelawan' => $request->kriteriaRelawan,
            'SyaratDanInstruksiKegiatanRelawan' => $request->persyaratan,
            'KontakKegiatanRelawan' => $request->kontakSpesifik,
        ]);

                return redirect()->route('buat_kegiatan_relawan.show')->with('success', 'Kegiatan relawan berhasil dibuat.');
            } else {
                return redirect()->back()->withErrors($validatedData)->withInput();
            }
       }


}
