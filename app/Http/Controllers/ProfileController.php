<?php

namespace App\Http\Controllers;

use App\Models\Models\PantiSosial;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $user = PantiSosial::find($request->id);
        return view('profile_pansos/profile', compact('user'));
    }

    public function test(){
        return view('profile_pansos.test');
    }
}
