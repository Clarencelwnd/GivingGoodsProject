<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonaturAtauRelawan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterDonaturRelawanController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|min:7',
            'password' => 'required|min:8', // sesuaikan validasi sesuai kebutuhan
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            // Email sudah terdaftar
            $registeredEmail = $user->email;// Mengambil email yang sudah terdaftar
            return back()->with('exists', true)->with('registeredEmail', $registeredEmail);// Mengirim email yang sudah terdaftar ke view
        } else {
            // Email belum terdaftar
            $users = new User();
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->role = 'donatur_relawan';
            $result = $users->save();

            $DonaturRelawan = new DonaturAtauRelawan();
            $DonaturRelawan->IDUser = $users->id;
            $DonaturRelawan->NamaDonaturRelawan = $request->name;
            $DonaturRelawan->NomorTeleponDonaturRelawan = '+62' . $request->phone;
            $DonaturRelawan->FotoDonaturRelawan = 'https://www.gravatar.com/avatar/?d=mp&s=200';
            $result = $DonaturRelawan->save();

            //Berhasil save
            if ($result){
                return back()->with('success', 'Registration successful');
            }else{
                return back()->with('fail', 'Registration failed');
            }
        }

    }
}
