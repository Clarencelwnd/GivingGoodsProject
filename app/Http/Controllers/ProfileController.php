<?php

namespace App\Http\Controllers;

use App\Models\JadwalOperasional;
use App\Models\PantiSosial;
use App\Models\RegistrasiRelawan;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $jadwalPansos = JadwalOperasional::where('IDPantiSosial', $request->id)->get();
        $detailPansos = PantiSosial::find($request->id);
        $userPansos = $detailPansos->User;

        // $registrasiRelawan = RegistrasiRelawan::where('IDRegistrasiRelawan', "1")->first();
        // $timestamp = strtotime($registrasiRelawan->TanggalKegiatanMulaiRelawan);
        // $hari = date("l", $timestamp);
        // $tes = date("l", $registrasiRelawan->TanggalKegiatanMulaiRelawan);
        // dd(config('app.locale'));
        // dd($hari);


        // dd($jadwalPansos, $detailPansos, $userPansos);
        return view('profile_pansos/profile', compact('jadwalPansos', 'detailPansos', 'userPansos'));
    }

}
