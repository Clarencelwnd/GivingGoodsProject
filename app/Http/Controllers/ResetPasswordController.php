<?php

namespace App\Http\Controllers;

use App\Models\Models\DonaturAtauRelawan;
use App\Models\Models\PantiSosial;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index(){
        return view('reset_password/email_reset_password');
    }

    public function checking_email(Request $request){
        $email = $request->email;
        // cari email di donatur/relawan
        $foundEmail = DonaturAtauRelawan::where('EmailDonaturRelawan', 'LIKE', "$email")->first();
        // klu ga ada, cari di panti sosial
        if(!$foundEmail){
            $foundEmail = PantiSosial::where('EmailPantiSosial', 'LIKE', "$email")->first();
        }

        // klu email ditemukan/ga ditemukan di dua tabel itu:
        if($foundEmail){
            return view('reset_password/input_otp', compact('email'));
        }
        else{
            return view('reset_password/pop_up_email', compact('email'));
        }
    }

    public function test(){
        return view('reset_password/pop_up_email');
    }
    public function input_otp(){
        return view('reset_password/input_otp');
    }
    public function new_password(){
        return view('reset_password/new_password');
    }
    public function exit_reset_password(){
        return view('reset_password/pop_up_exit_reset_password');
    }
}
