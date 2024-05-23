<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\KegiatanRelawan;

class DetailKegiatanRelawanController extends Controller
{
    public function show($id)
    {
        $kegiatanRelawan = KegiatanRelawan::find($id);

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('DetailKegiatanRelawan', compact('kegiatanRelawan'));
    }



    public function destroy($id)
    {
        $kegiatanRelawan = KegiatanRelawan::findOrFail($id);
        $kegiatanRelawan->delete();

        return redirect()->route('kegiatan-relawan.index')->with('success', 'Kegiatan relawan berhasil dihapus.');
    }
}
