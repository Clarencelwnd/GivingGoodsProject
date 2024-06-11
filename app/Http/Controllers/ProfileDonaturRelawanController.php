<?php

namespace App\Http\Controllers;

use App\Models\DonaturAtauRelawan;
use App\Models\JadwalOperasional;
use App\Models\PantiSosial;
use App\Models\RegistrasiDonatur;
use App\Models\RegistrasiRelawan;
use App\Models\KegiatanDonasi;
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
        // dd($request->input('TanggalLahirDonaturRelawan'));
        $validator = Validator::make($request->all(),[
            'NamaDonaturRelawan' => 'required',
            'TanggalLahirDonaturRelawan' => 'required',
            'JenisKelaminDonaturRelawan' => ['required', 'regex:/^(Laki-laki|Perempuan)$/'],
            'NomorTeleponDonaturRelawan' => 'required|regex:/^\+628\d{9,11}$/',
            'AlamatDonaturRelawan' => 'required|max:450',
            'LinkGoogleMapsDonaturRelawan' => 'required|regex:/^https:\/\/maps\.app\.goo\.gl\//'
        ],
        [
            'NamaDonaturRelawan.required' => 'Nama donatur atau relawan wajib diisi.',
            'TanggalLahirDonaturRelawan.required' => 'Tanggal lahir donatur atau relawan wajib diisi.',
            'JenisKelaminDonaturRelawan.required' => 'Jenis kelamin donatur atau relawan wajib diisi.',
            'JenisKelaminDonaturRelawan.regex' => 'Jenis kelamin donatur atau relawan hanya bisa diisi dengan Laki-laki atau Perempuan.',
            'NomorTeleponDonaturRelawan.required' => 'Nomor handphone donatur atau relawan wajib diisi.',
            'NomorTeleponDonaturRelawan.regex' => 'Nomor handphone donatur atau relawan wajib berisi angka yang dimulai dengan +62 diikuti dengan 10 - 12 digit.',
            'AlamatDonaturRelawan.required' => 'Alamat donatur atau relawan wajib diisi.',
            'AlamatDonaturRelawan.max' => 'Alamat donatur atau relawan maksimal berisi 450 karakter.',
            'LinkGoogleMapsDonaturRelawan.required' => 'Link google maps alamat donatur atau relawan wajib diisi.',
            'LinkGoogleMapsDonaturRelawan.regex' => 'Link google maps wajib dengan format -> https://maps.app.goo.gl/'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

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

        return redirect()->back()->with('success', 'Berhasil Diubah');
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

    public function riwayat_kegiatan_view($id){
        // ambil data registrasi
        $registrasiDonatur = RegistrasiDonatur::with(['kegiatanDonasi.pantiSosial'])->where('IDDonaturRelawan', $id)->get();
        $registrasiRelawan = RegistrasiRelawan::with(['kegiatanRelawan.pantiSosial'])->where('IDDonaturRelawan', $id)->get();

        // format tanggal dan gambar donasi
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        $FotoDonasi = [
            'pakaian' => 'Image/donasi/pakaian.png',
            'sepatu' => 'Image/donasi/sepatu.png',
            'mainan' => 'Image/donasi/mainan.png',
            'keperluan_ibadah' => 'Image/donasi/perlengkapan_ibadah.png',
            'buku' => 'Image/donasi/buku.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'keperluan_mandi' => 'Image/donasi/toiletries.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'alat_tulis' => 'Image/donasi/alat_tulis.png'
        ];
        foreach ($registrasiDonatur as $registDonatur) {
            $partitionTanggalDonasi = explode('-', $registDonatur->TanggalDonasi);
            $registDonatur->setAttribute('FormatTanggalDonasi', $partitionTanggalDonasi[2] . ' ' . $bulan[$partitionTanggalDonasi[1]] . ' ' . $partitionTanggalDonasi[0]);

            $donasiItems = explode(',', $registDonatur->JenisDonasiDidonasikan);
            foreach ($donasiItems as $donasi) {
                $donasi = trim($donasi);
                }
            $registDonatur->setAttribute('donasiDanGambar', array_map(function($jenis) use ($FotoDonasi){
                return[
                    'jenis' => $jenis,
                    'image' => $FotoDonasi[$jenis],
                ];
            }, $donasiItems));
        }

        // format tanggal relawan
        foreach ($registrasiRelawan as $registRelawan) {
            $partitionTanggalMulai = explode('-', $registRelawan->TanggalKegiatanMulaiRelawan);
            $partitionTanggalSelesai = explode('-', $registRelawan->TanggalKegiatanSelesaiRelawan);
            $registRelawan->setAttribute('FormatTanggalRelawan', $partitionTanggalMulai[2] . ' ' . $bulan[$partitionTanggalMulai[1]] . ' ' . $partitionTanggalMulai[0] . ' - ' . $partitionTanggalSelesai[2] . ' ' . $bulan[$partitionTanggalSelesai[1]] . ' ' . $partitionTanggalSelesai[0]);
        }

        return view('profile_donatur_relawan/riwayat_kegiatan', compact('id', 'registrasiDonatur', 'registrasiRelawan'));
    }

    public function logout(){
        Auth::logout();
        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('password'));
        return view('profile_donatur_relawan/dummy_home_page_not_login');
    }
}
