<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonaturAtauRelawan;

class RegisterDonaturRelawanController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:255',
            // 'email' => 'required|email|unique:donatur_atau_relawan,EmailDonaturRelawan',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:7',
            'password' => 'required|min:8', // sesuaikan validasi sesuai kebutuhan
        ]);

        $email = $request->input('email');
        $user = DonaturAtauRelawan::where('EmailDonaturRelawan', $email)->first();

        if ($user) {
            // Email sudah terdaftar
            $registeredEmail = $user->EmailDonaturRelawan;// Mengambil email yang sudah terdaftar
            return back()->with('exists', true)->with('registeredEmail', $registeredEmail);// Mengirim email yang sudah terdaftar ke view
        } else {
            // Email belum terdaftar
            $user = new DonaturAtauRelawan();
            $user->EmailDonaturRelawan = $request->email;
            $user->PasswordDonaturRelawan = $request->password;
            $user->NamaDonaturRelawan = $request->name;
            $user->NomorTeleponDonaturRelawan = $request->phone;
            $result = $user->save();
            //Berhasil save
            if ($result){
                return back()->with('success', 'Registration successful');
            }else{
                return back()->with('fail', 'Registration failed');
            }
        }

    }
}
