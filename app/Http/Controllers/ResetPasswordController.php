<?php

namespace App\Http\Controllers;

use App\Models\Models\DonaturAtauRelawan;
use App\Models\Models\PantiSosial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\OtpMail;

use function PHPUnit\Framework\returnValue;

class ResetPasswordController extends Controller
{

    public function index(){
        return view('reset_password/email_reset_password');
    }

    public function checking_email(Request $request){

        // validasiin email
        $validator = Validator::make($request->all(),[
            'email' => 'required|email'
        ],
        [
            'required' => 'Email wajib diisi.',
            'email' => 'Masukkan email dengan format yang sesuai.'
        ]);

        // validasi gagal
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->input('email');

        // cari email di donatur/relawan
        $foundEmail = DonaturAtauRelawan::where('EmailDonaturRelawan', 'LIKE', "$email")->first();
        // klu ga ada, cari di panti sosial
        if(!$foundEmail){
            $foundEmail = PantiSosial::where('EmailPantiSosial', 'LIKE', "$email")->first();
        }

        // klu email ditemukan/ga ditemukan di dua tabel itu:
        if($foundEmail){
            session()->put('email', $email);
            $this->sending_otp();
            $otp = session()->get('otp');
            return view('reset_password/input_otp', compact('email', 'otp'));
        }
        else{
            return view('reset_password/pop_up_email', compact('foundEmail'));
        }
    }

    public function input_otp(){
        $this->sending_otp();
        $email = session()->get('email');
        $otp = session()->get('otp');
        return view('reset_password/input_otp', compact('email', 'otp'));
    }

    public function sending_otp(){
        $title = "One Time Password - GivingGoods";
        $otp = rand(111111, 999999);
        $body = $otp . " adalah OTP yang perlu Anda masukkan ke dalam website GivingGoods.";
        session()->put('otp', strval($otp));
        Mail::to(session()->get('email'))->send(new OtpMail($title, $body));
    }

    public function checking_otp(Request $request){
        $otp = $request->input('otp');
        if($otp == session()->get('otp')){
            return view('reset_password/new_password');
        }
        else{
            return redirect()->route('input_otp')->withErrors(['otp' => 'Mohon maaf OTP yang Anda masukkan salah. Silakan coba lagi.']);
        }
    }

    public function new_password(){
        return view('reset_password/new_password');
    }

    public function checking_password(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed'
        ],
        [
            'required' => 'Password wajib diisi.',
            // 'email' => 'Masukkan password dengan ketentuan: .'
        ]);


    }

    public function exit_reset_password(){
        return view('reset_password/pop_up_exit_reset_password');
    }

    public function test(){
        return view('reset_password.input_wrong_otp');
    }
}
