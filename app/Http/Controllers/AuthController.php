<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function displayLoginView(){
        return view('login');
    }

    public function checkLogin (Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, true)){

            if($request->remember){
                Cookie::queue('user', Auth::user(), 60);
            }
           Session::put('user', Auth::user());
           return redirect('home');
        };

        return redirect()->back();

        function logout(){
            Auth::logout();
            Cookie::queue(Cookie::forget('user'));
            Session::invalidate();
            Session::regenerateToken();
            return redirect('login');
        }
    }

    public function displayHomeView(){
        return view('testHome');
    }

}
