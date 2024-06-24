<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\PantiSosial;


class BuatKegiatanDonasiController extends Controller
{

    // Menampilkan form buat kegiatan donasi
    public function show($id)
    {
        $pantiSosial = PantiSosial::find($id);

        if (!$pantiSosial) {
            return redirect()->back()->with('error', 'Panti Sosial tidak ditemukan');
        }

        return view('KegiatanDonasiPantiSosial.BuatKegiatanDonasi', compact('pantiSosial', 'id'));
    }


    // Menyimpan data kegiatan donasi ke database
    public function store(Request $request, $id)
       {
        $validatedData = $request->validate([
               'namaKegiatan' => 'required|string|max:255|unique:kegiatan_donasi,NamaKegiatanDonasi',
               'deskripsiKegiatan' => 'required|string|max:255',
               'tglMulai' => 'required|date',
               'tglSelesai' => 'required|date',
               'jenisDonasi' => 'required|string|max:255',
               'deskripsiJenisDonasi' => 'required|string|max:255',
               'lokasiKegiatan' => 'required|string|max:255',
               'linkGoogleMaps' => 'required|string|max:255',
               'fotoKegiatan' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
               'jasaAmbilBarang' => 'required|string|max:255',
               'IDPantiSosial' => 'required|integer|exists:panti_sosial,IDPantiSosial',
           ]);

        if ($validatedData) {
            $fotoKegiatanUrl = null;
           if ($request->hasFile('fotoKegiatan')) {
               $file = $request->file('fotoKegiatan');
               $fileName = time() . '_' . $file->getClientOriginalName();
               $file->storeAs('fotoKegiatanDonasi', $fileName, 'public');

               // Mendapatkan URL gambar
               $fotoKegiatanUrl = asset('storage/fotoKegiatanDonasi/' . $fileName);
           }
        //    dd($request);
           KegiatanDonasi::create([
               'IDPantiSosial' => $request->IDPantiSosial,
               'GambarKegiatanDonasi' => $fotoKegiatanUrl,
               'NamaKegiatanDonasi' => $request->namaKegiatan,
               'DeskripsiKegiatanDonasi' => $request->deskripsiKegiatan,
               'JenisDonasiDibutuhkan' => $request->jenisDonasi,
               'TanggalKegiatanDonasiMulai' => $request->tglMulai,
               'TanggalKegiatanDonasiSelesai' => $request->tglSelesai,
               'DeskripsiJenisDonasi' => $request->deskripsiJenisDonasi,
               'LokasiKegiatanDonasi' => $request->lokasiKegiatan,
               'LinkGoogleMapsLokasiKegiatanDonasi' => $request->linkGoogleMaps,
               'JasaPickup' => $request->jasaAmbilBarang,
           ]);

           return redirect()->route('viewAllKegiatan', compact('id'))->with('success', 'Kegiatan donasi berhasil dibuat.');
        } else {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
    }

}
