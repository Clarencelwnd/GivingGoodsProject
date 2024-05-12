<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\DonaturAtauRelawan;

class RegisterDonaturRelawanController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input yang diterima dari formulir
            $validatedData = $request->validate([
                'email' => 'required|email|unique:donatur_atau_relawan,EmailDonaturRelawan',
                'password' => 'required|min:8',
                // Tambahkan validasi untuk data lain jika diperlukan
            ]);

            // Email belum terdaftar, lanjutkan dengan registrasi
            DonaturAtauRelawan::create($validatedData);

            // Response JSON untuk dikirimkan ke JavaScript
            return response()->json(['exists' => false]);
        } catch (\Exception $e) {
            // Tangani kesalahan dengan memberikan respons yang sesuai
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Metode untuk memeriksa apakah email sudah terdaftar atau belum
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        $user = DonaturAtauRelawan::where('EmailDonaturRelawan', $email)->first();

        if ($user) {
            // Email sudah terdaftar
            return response()->json(['exists' => true]);
        } else {
            // Email belum terdaftar
            return response()->json(['exists' => false]);
        }
    }
}
