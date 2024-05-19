<?php

namespace App\Http\Controllers;

use App\Models\PantiSosial;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        // $user = User::find($requ)
        $detailPansos = PantiSosial::find($request->id);
        $userPansos = $detailPansos->User;
        dd($detailPansos, $userPansos);
        return view('profile_pansos/profile', compact('detailPansos', 'userPansos'));
    }

    public function test(){
        return view('profile_pansos.test');
    }
}
