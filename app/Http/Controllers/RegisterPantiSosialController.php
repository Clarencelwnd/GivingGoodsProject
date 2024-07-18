<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PantiSosial;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterPantiSosialController extends Controller
{
    // Untuk register panti sosial halaman pertama
    public function registerPantiSosial1(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(),[
            'organization-name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^8\d{9,11}$/',
            'password' => 'required|min:8',
        ],
        [
            'organization-name.required' => 'Nama panti sosial wajib diisi.',
            'organization-name.min' => 'Nama panti sosial minimal berisi 2 karakter.',
            'organization-name.max' => 'Nama panti sosial maksimal berisi 255 karakter.',
            'email.required' => 'Email panti sosial wajib diisi.',
            'email.email' => 'Email panti sosial wajib diisi dengan format email yang sesuai.',
            'phone.required' => 'Nomor telepon panti sosial wajib diisi.',
            'phone.regex' => 'Nomor telepon panti sosial wajib berisi angka yang dimulai dengan 8 diikuti dengan 9 - 11 digit.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal berisi 8 karakter.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek apakah email sudah ada di database PantiSosial
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            // Jika email sudah ada, return error message
            $registeredEmail = $user->email;// Mengambil email yang sudah terdaftar
            return back()->with('exists', true)->with('registeredEmail', $registeredEmail)->withInput();// Mengirim email yang sudah terdaftar ke view
            // return back()->withInput()->with('error', 'Email sudah terdaftar.');
        } else {
            // Simpan data yang ingin Anda kirim ke halaman berikutnya di sesi
            $request->session()->put('organization_name', $request->input('organization-name'));
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('phone', '+62' . $request->input('phone'));
            $request->session()->put('password', $request->input('password'));
            // Lanjut ke halaman berikutnya jika validasi berhasil
            return redirect()->route('registerPantiSosialNext');
        }
    }


    public function registerPantiSosial2(Request $request)
    {
        // Ambil data dari session
        $organizationName = $request->session()->get('organization_name');
        $email = $request->session()->get('email');
        $phone = $request->session()->get('phone');
        $password = $request->session()->get('password');

        // Validasi input
        $validator = Validator::make($request->all(),[
            'registration_num' => 'required',
            'validation_document' => 'required|file|mimes:jpg,png,pdf|max:10240',
        ],
        [
            'registration_num.required' => 'Nomor registrasi panti sosial pada pemerintahan wajib diisi.',
            'validation_document.required' => 'Bukti registrasi berupa dokumen validitas panti sosial wajib diisi.',
            'validation_document.file' => 'Dokumen validitas yang diunggah harus berupa file.',
            'validation_document.mimes' => 'Dokumen validitas wajib dengan format jpg, png, atau pdf.',
            'validation_document.max' => 'Ukuran maksimal dokumen validitas adalah 10MB.',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
