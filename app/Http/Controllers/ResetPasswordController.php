<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        // cari email
        $foundEmail = User::where('email', 'LIKE', "$email")->first();

        session()->put('email', $email);

        // klu email ditemukan/ga
        if($foundEmail){
            $this->sending_otp();
            return view('reset_password/input_otp');
        }
        else{
            session()->put('showModal', true);
            return back();
        }
    }

    public function input_otp(){
        $this->sending_otp();
        return view('reset_password/input_otp');
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
            return redirect()->route('input_otp')->withErrors(['otp' => 'Mohon maaf OTP yang Anda masukkan salah. Kode OTP baru telah dikirimkan ke email Anda.']);
        }
    }

    public function new_password(){
        return view('reset_password/new_password');
    }

    public function checking_password(Request $request){
        // validasi password
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed'
        ],
        [
            'required' => 'Kata sandi wajib diisi.',
            'confirmed' => 'Ketik ulang kata sandi baru dengan kata sandi yang sama.'
        ]);

        // validasi gagal
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = session()->get('email');

        // cari email
        $foundEmail = User::where('email', 'LIKE', "$email")->first();

        // hashing password
        $password = Hash::make($request->input('password'));

        // masukkan password baru
        $foundEmail->password = $password;
        $foundEmail->save();

        session()->forget(['email', 'otp']);
        session()->flush();

        return view('reset_password/dummy_login');
    }

    public function exit_reset_password(){
        return view('reset_password/pop_up_exit_reset_password');
    }
}
