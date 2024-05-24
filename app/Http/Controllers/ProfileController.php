<?php

namespace App\Http\Controllers;

use App\Models\JadwalOperasional;
use App\Models\PantiSosial;
use App\Models\RegistrasiRelawan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        $jadwalPansos = JadwalOperasional::where('IDPantiSosial', $id)->get();
        $detailPansos = PantiSosial::find($id);
        $userPansos = $detailPansos->User;

        foreach ($jadwalPansos as $jadwal) {
            if($jadwal->JamBukaPantiSosial){
                $jadwal->JamBukaPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamBukaPantiSosial)->format('H:i');
                $jadwal->JamTutupPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamTutupPantiSosial)->format('H:i');
            }
        }
        return view('profile_pansos/profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos'));
    }

    public function edit_view($id){
        // $id = $request->id;
        $jadwalPansos = JadwalOperasional::where('IDPantiSosial', $id)->get();
        $detailPansos = PantiSosial::find($id);
        $userPansos = $detailPansos->User;

        foreach ($jadwalPansos as $jadwal) {
            if($jadwal->JamBukaPantiSosial){
                $jadwal->JamBukaPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamBukaPantiSosial)->format('H:i');
                $jadwal->JamTutupPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamTutupPantiSosial)->format('H:i');
            }
        }

        return view('profile_pansos/edit_profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos'));
    }

    public function edit_logic(Request $request){

    }

}
