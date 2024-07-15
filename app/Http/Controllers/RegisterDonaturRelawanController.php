<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonaturAtauRelawan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterDonaturRelawanController extends Controller
{
    public function registerUser(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^8\d{9,11}$/',
            'password' => 'required|min:8',
        ],
        [
            'name.required' => 'Nama donatur atau relawan wajib diisi.',
            'name.min' => 'Nama donatur atau relawan minimal berisi 2 karakter.',
            'name.max' => 'Nama donatur atau relawan maksimal berisi 255 karakter.',
            'email.required' => 'Email donatur atau relawan wajib diisi.',
            'email.email' => 'Email donatur atau relawan wajib memenuhi format email.',
            // 'email.unique' => 'Email donatur atau relawan wajib unik',
            // 'TanggalLahirDonaturRelawan.required' => 'Tanggal lahir donatur atau relawan wajib diisi.',
            // 'JenisKelaminDonaturRelawan.required' => 'Jenis kelamin donatur atau relawan wajib diisi.',
            // 'JenisKelaminDonaturRelawan.regex' => 'Jenis kelamin donatur atau relawan hanya bisa diisi dengan Laki-laki atau Perempuan.',
            'phone.required' => 'Nomor handphone donatur atau relawan wajib diisi.',
            'phone.regex' => 'Nomor handphone donatur atau relawan wajib berisi angka yang dimulai dengan 8 diikuti dengan 10 - 12 digit.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal berisi 8 karakter.',
            // 'AlamatDonaturRelawan.required' => 'Alamat donatur atau relawan wajib diisi.',
            // 'AlamatDonaturRelawan.max' => 'Alamat donatur atau relawan maksimal berisi 450 karakter.',
            // 'LinkGoogleMapsDonaturRelawan.required' => 'Link google maps alamat donatur atau relawan wajib diisi.',
            // 'LinkGoogleMapsDonaturRelawan.regex' => 'Link google maps wajib dengan format -> https://www.google.com/maps/place/'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $request->validate([
        //     'name' => 'required|min:2|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'phone' => 'required|numeric|min:7',
        //     'password' => 'required|min:8', // sesuaikan validasi sesuai kebutuhan
        // ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            // Email sudah terdaftar
            $registeredEmail = $user->email;// Mengambil email yang sudah terdaftar
            return back()->with('exists', true)->with('registeredEmail', $registeredEmail)->withInput();// Mengirim email yang sudah terdaftar ke view
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
