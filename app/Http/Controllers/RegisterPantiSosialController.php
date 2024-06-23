<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PantiSosial;

class RegisterPantiSosialController extends Controller
{
    // Untuk register panti sosial halaman pertama
    public function registerPantiSosial1(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'organization-name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:panti_sosial,EmailPantiSosial',
            'phone' => 'required|numeric|min:7',
            'password' => 'required|min:8',
        ]);

        // Cek apakah email sudah ada di database PantiSosial
        $email = $request->input('email');
        $user = PantiSosial::where('EmailPantiSosial', $email)->first();

        if ($user) {
            // Jika email sudah ada, return error message
            return back()->withInput()->with('error', 'Email sudah terdaftar.');
        }

         // Simpan data yang ingin Anda kirim ke halaman berikutnya di sesi
        $request->session()->put('organization_name', $request->input('organization-name'));
        $request->session()->put('email', $request->input('email'));
        $request->session()->put('phone', $request->input('phone'));
        $request->session()->put('password', $request->input('password'));
        // Lanjut ke halaman berikutnya jika validasi berhasil
        return redirect()->route('registerPantiSosialNext');
    }


    public function registerPantiSosial2(Request $request)
    {
        // Ambil data dari session
        $organizationName = $request->session()->get('organization_name');
        // $email = $request->session()->get('email');
        $phone = $request->session()->get('phone');
        $password = $request->session()->get('password');

        // Validasi input
        $request->validate([
            'registration_num' => 'required',
            'validation_document' => 'required|file|mimes:jpg,png|max:10240',
        ]);

        // Simpan data dari halaman kedua dan data dari session ke dalam database
        // $email = $request->input('email');
        $email = $request->session()->get('email');
        $user = PantiSosial::where('EmailPantiSosial', $email)->first();

        if ($user) {
            // Email sudah terdaftar
            return back()->with('exists', true);
        } else {
            // Email belum terdaftar
            $user = new PantiSosial();
            $user->NamaPantiSosial = $organizationName;
            $user->EmailPantiSosial = $email;
            $user->NomorTeleponPantiSosial = $phone;
            $user->NomorRegistrasiPantiSosial = $request->registration_num;


              // untuk uplaod file dan menyimpan path ke database
              if ($request->hasFile('validation_document')) {
                $file = $request->file('validation_document');
                $fileName = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('validasi_dokumen'), $fileName); // memindahkan file ke direktori 'public/validasi_dokumen'
                $user->DokumenValiditasPantiSosial = 'validasi_dokumen/' . $fileName; // menyimpan URL file ke kolom DokumenValiditasPantiSosial
            } else {
                return back()->with('fail', 'Dokumen validitas harus diunggah');
            }


            $result = $user->save();
            //Berhasil save
            if ($result){
                return back()->with('success', 'Registration successful');
            }else{
                return back()->with('fail', 'Registration failed');
            }
        }

        // Hapus data dari session setelah disimpan ke database
        // $request->session()->forget(['organization_name', 'email', 'phone', 'password']);


    }



}
