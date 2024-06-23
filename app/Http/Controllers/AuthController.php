<?php

namespace App\Http\Controllers;

use App\Models\DonaturAtauRelawan;
use App\Models\PantiSosial;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function displayLoginView(){
        return view('Login.login');
    }

    public function loginUser(Request $request){
        $request -> validate([
            'email' => 'required | email ',
            'password' => 'required | min:5 | max:12'
         ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->with('fail', '❌  Email belum terdaftar');
        }

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            if($user->role === 'panti_sosial'){
                $panti_sosial = PantiSosial::where('IDUser', $user->id)->first();
                $id = $panti_sosial->IDPantiSosial;
                return redirect()->route('viewAllKegiatan', compact('id'));
            } else if($user->role === 'donatur_relawan'){
                $donatur_relawan = DonaturAtauRelawan::where('IDUser', $user->id)->first();
                $id = $donatur_relawan->IDDonaturRelawan;
                return redirect()->route('halamanUtama', compact('id'));
            };
        }
        return back()->with('fail', '❌  Email/Kata Sandi salah');

    }

    public function displayHomeView(){
        return view('testHome');
    }

    public function logoutUser(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
