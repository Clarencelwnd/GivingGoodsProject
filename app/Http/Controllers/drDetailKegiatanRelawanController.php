<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;

class drDetailKegiatanRelawanController extends Controller
{
    public function show($id)
    {
        $kegiatanRelawan = KegiatanRelawan::find($id);

        if (!$kegiatanRelawan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        return view('drDetailKegiatanRelawan', compact('kegiatanRelawan'));
    }
}
