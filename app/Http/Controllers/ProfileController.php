<?php

namespace App\Http\Controllers;

use App\Models\JadwalOperasional;
use App\Models\PantiSosial;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $jadwalPansos = JadwalOperasional::where('IDPantiSosial', $request->id)->get();
        $detailPansos = PantiSosial::find($request->id);
        $userPansos = $detailPansos->User;

        // dd($jadwalPansos, $detailPansos, $userPansos);
        return view('profile_pansos/profile', compact('jadwalPansos', 'detailPansos', 'userPansos'));
    }

}
