<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\DonaturAtauRelawan;

class RegisterDonaturRelawanController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:255',
            // 'email' => 'required|email|unique:donatur_atau_relawan,EmailDonaturRelawan',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:7',
            'password' => 'required|min:8', // sesuaikan validasi sesuai kebutuhan
            // Tambahkan validasi untuk data lain jika diperlukan
        ]);

        $email = $request->input('email');
        $user = DonaturAtauRelawan::where('EmailDonaturRelawan', $email)->first();

        if ($user) {
            // Email sudah terdaftar
            // return response()->json(['exists' => true]);
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

    // public function store(Request $request)
    // {
    //     try {
    //         // Validasi input yang diterima dari formulir
    //         $validatedData = $request->validate([
    //             'email' => 'required|email|unique:donatur_atau_relawan, EmailDonaturRelawan',
    //             'password' => 'required|min:8',
    //             'phone' => 'required |min:7 |max:13', // sesuaikan validasi sesuai kebutuhan
    //             'name' => 'required| min:2 | max:15' // sesuaikan validasi sesuai kebutuhan
    //             // Tambahkan validasi untuk data lain jika diperlukan
    //         ]);

    //         // Email belum terdaftar, lanjutkan dengan registrasi
    //         DonaturAtauRelawan::create($validatedData);

    //         // Response JSON untuk dikirimkan ke JavaScript
    //         return response()->json(['exists' => false]);
    //     } catch (\Exception $e) {
    //         // Tangani kesalahan dengan memberikan respons yang sesuai
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // Metode untuk memeriksa apakah email sudah terdaftar atau belum
    // public function checkEmail(Request $request)
    // {
    //     $email = $request->input('email');

    //     $user = DonaturAtauRelawan::where('EmailDonaturRelawan', $email)->first();

    //     if ($user) {
    //         // Email sudah terdaftar
    //         return response()->json(['exists' => true]);
    //     } else {
    //         // Email belum terdaftar
    //         return response()->json(['exists' => false]);
    //     }
    // }
}
