<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PantiSosial;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterPantiSosialController extends Controller
{
    // Untuk register panti sosial halaman pertama
    public function registerPantiSosial1(Request $request)
    {
        // Validasi input
        $request->validate([
            'organization-name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|min:7',
            'password' => 'required|min:8',
        ]);

        // Cek apakah email sudah ada di database PantiSosial
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            // Jika email sudah ada, return error message
            return back()->withInput()->with('error', 'Email sudah terdaftar.');
        }

         // Simpan data yang ingin Anda kirim ke halaman berikutnya di sesi
        $request->session()->put('organization_name', $request->input('organization-name'));
        $request->session()->put('email', '+62' . $request->input('email'));
        $request->session()->put('phone', $request->input('phone'));
        $request->session()->put('password', $request->input('password'));
        // Lanjut ke halaman berikutnya jika validasi berhasil
        return redirect()->route('registerPantiSosialNext');
    }


    public function registerPantiSosial2(Request $request)
    {
        // Ambil data dari session
        $organizationName = $request->session()->get('organization_name');
        $email = $request->session()->get('email');
        $phone = $request->session()->get('phone');
        $password = $request->session()->get('password');

        // Validasi input
        $request->validate([
            'registration_num' => 'required',
            'validation_document' => 'required|file|mimes:jpg,png|max:10240',
        ]);

        $users = new User();
        $users->email = $email;
        $users->password = Hash::make($password);
        $users->role = 'panti_sosial';
        $result1 = $users->save();

        // Email belum terdaftar
        $PantiSosial = new PantiSosial();
        $PantiSosial->IDUser = $users->id;
        $PantiSosial->NamaPantiSosial = $organizationName;
        $PantiSosial->NomorTeleponPantiSosial = $phone;
        $PantiSosial->NomorRegistrasiPantiSosial = $request->registration_num;
        $PantiSosial->LogoPantiSosial = 'https://www.gravatar.com/avatar/?d=mp&s=200';

        $validation_document_url = null;
        // untuk uplaod file dan menyimpan path ke database
        if ($request->hasFile('validation_document')) {
            $file = $request->file('validation_document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('documents', $fileName, 'public');
            $validation_document_url = asset('/storage/documents/' . $fileName);

            $PantiSosial->DokumenValiditasPantiSosial = $validation_document_url; // menyimpan URL file ke kolom DokumenValiditasPantiSosial
        } else {
            return back()->with('fail', 'Dokumen validitas harus diunggah');
        }


        $result2 = $PantiSosial->save();
        //Berhasil save
        if ($result1 && $result2){
            return back()->with('success', 'Registration successful');
        }else{
            return back()->with('fail', 'Registration failed');
        }
    }



}
