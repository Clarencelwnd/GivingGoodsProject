<?php

namespace App\Http\Controllers;

use App\Models\DonaturAtauRelawan;
use App\Models\JadwalOperasional;
use App\Models\PantiSosial;
use App\Models\RegistrasiRelawan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\map;

class ProfileDonaturRelawanController extends Controller
{
    public function index(Request $request){
        // nyari data di tabel
        $id = $request->id;
        $detailDR = DonaturAtauRelawan::find($id);
        $userDR = $detailDR->User;

        return view('profile_donatur_relawan/profile', compact('id', 'detailDR', 'userDR'));
    }

    public function edit_view($id){
        // nyari data di tabel
        $detailDR = DonaturAtauRelawan::find($id);
        $userDR = $detailDR->User;

        return view('profile_donatur_relawan/edit_profile', compact('id', 'detailDR', 'userDR'));
    }

    public function edit_profile_logic(Request $request, $id){
        // update tabel pansos
        DonaturAtauRelawan::where('IDDonaturRelawan', $id)->update(
            [
                'NamaDonaturRelawan' => $request->input('NamaDonaturRelawan'),
                'TanggalLahirDonaturRelawan' => $request->input('TanggalLahirDonaturRelawan'),
                'JenisKelaminDonaturRelawan' => $request->input('JenisKelaminDonaturRelawan'),
                'NomorTeleponDonaturRelawan' => $request->input('NomorTeleponDonaturRelawan'),
                'AlamatDonaturRelawan' => $request->input('AlamatDonaturRelawan'),
                'LinkGoogleMapsDonaturRelawan' => $request->input('LinkGoogleMapsDonaturRelawan')
            ]
        );

        // update tabel user
        $user = DonaturAtauRelawan::find($id)->User;
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile.donatur_relawan', ['id'=>$id]);
    }

    public function edit_photo_logic(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'FotoDonaturRelawan' => 'image|mimes:jpg,png,jpeg|max:3000'
        ],
        [
            'image' => 'File yang diunggah harus berupa gambar.',
            'mimes' => 'Foto wajib dengan format jpg, png, atau jpeg.',
            'max' => 'Ukuran foto maksimal adalah 3MB.'
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $original_name = $request->file('FotoDonaturRelawan')->getClientOriginalName();
        $original_ext = $request->file('FotoDonaturRelawan')->getClientOriginalExtension();
        $foto_donatur_relawan_name = $original_name . time() . '.' . $original_ext;

        $request->file('FotoDonaturRelawan')->storeAs('public/Profile', $foto_donatur_relawan_name);
        $foto_donatur_relawan = 'storage/Profile/' . $foto_donatur_relawan_name;

        $detailDR = DonaturAtauRelawan::find($id);
        $detailDR->FotoDonaturRelawan = $foto_donatur_relawan;
        $detailDR->save();

        return redirect()->route('profile.donatur_relawan',['id'=>$id]);
    }

    public function change_password_view($id){
        return view('profile_donatur_relawan/change_password', compact('id'));
    }

    public function change_password_logic(Request $request, $id){
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

        $password = Hash::make($request->input('password'));

        $user = DonaturAtauRelawan::find($id)->User;
        $user->password = $password;
        $user->save();

        return redirect()->back()->with('success', 'Berhasil Diubah');
    }

    public function logout(){
        Auth::logout();
        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('password'));
        return view('profile_donatur_relawan/dummy_home_page_not_login');
    }
}
