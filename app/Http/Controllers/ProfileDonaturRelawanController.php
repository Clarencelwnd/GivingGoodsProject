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
    public function index(Request $request, $id){
        // nyari data di tabel
        $detailDR = DonaturAtauRelawan::find($id);
        $userDR = $detailDR->User;

        return view('ProfileDonaturRelawan.profile', compact('id', 'detailDR', 'userDR'));
    }

    public function edit_view($id){
        // nyari data di tabel
        $detailDR = DonaturAtauRelawan::find($id);
        $userDR = $detailDR->User;

        return view('ProfileDonaturRelawan.edit_profile', compact('id', 'detailDR', 'userDR'));
    }

    public function edit_profile_logic(Request $request, $id){
        // dd($request->input('TanggalLahirDonaturRelawan'));
        $validator = Validator::make($request->all(),[
            'NamaDonaturRelawan' => 'required',
            'TanggalLahirDonaturRelawan' => 'required',
            'JenisKelaminDonaturRelawan' => ['required', 'regex:/^(Laki-laki|Perempuan)$/'],
            'NomorTeleponDonaturRelawan' => 'required|regex:/^\+628\d{9,11}$/',
            'AlamatDonaturRelawan' => 'required|max:450',
            'LinkGoogleMapsDonaturRelawan' => 'required|regex:/^https:\/\/www\.google\.com\/maps\/place\/.*$/'
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
            'LinkGoogleMapsDonaturRelawan.regex' => 'Link google maps wajib dengan format -> https://www.google.com/maps/place/'
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

        $foto_donatur_relawan_url = null;
        if($request->file('FotoDonaturRelawan')){
            $file = $request->file('FotoDonaturRelawan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('profileDR', $fileName, 'public');
            $foto_donatur_relawan_url = asset('storage/profileDR/' . $fileName);
        }

        $detailDR = DonaturAtauRelawan::find($id);
        $detailDR->FotoDonaturRelawan = $foto_donatur_relawan_url;
        $detailDR->save();

        return redirect()->route('profile.donatur_relawan',['id'=>$id]);
    }

    public function change_password_view($id){
        return view('ProfileDonaturRelawan.change_password', compact('id'));
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

    public function riwayat_kegiatan($id){
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
            'keperluan_ibadah' => 'Image/donasi/keperluan_ibadah.png',
            'buku' => 'Image/donasi/buku.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'keperluan_mandi' => 'Image/donasi/keperluan_mandi.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'alat_tulis' => 'Image/donasi/alat_tulis.png'
        ];
        foreach ($registrasiDonatur as $registDonatur) {
            $partitionTanggalDonasi = explode('-', $registDonatur->TanggalDonasi);
            $registDonatur->setAttribute('FormatTanggalDonasi', $partitionTanggalDonasi[2] . ' ' . $bulan[$partitionTanggalDonasi[1]] . ' ' . $partitionTanggalDonasi[0]);

            $donasiItems = explode(',', $registDonatur->JenisDonasiDidonasikan);
            $registDonatur->setAttribute('donasiDanGambar', array_map(function($jenis) use ($FotoDonasi){
                return[
                    'jenis' => $jenis,
                    'image' => $FotoDonasi[$jenis],
                ];
            }, $donasiItems));
        }

        // format tanggal relawan
        foreach ($registrasiRelawan as $registRelawan) {
            $partitionTanggalKehadiran = explode('-', $registRelawan->TanggalKehadiranRelawan);
            $registRelawan->setAttribute('FormatTanggalRelawan', $partitionTanggalKehadiran[2] . ' ' . $bulan[$partitionTanggalKehadiran[1]] . ' ' . $partitionTanggalKehadiran[0]);
        }

        return view('ProfileDonaturRelawan.riwayat_kegiatan', compact('id', 'registrasiDonatur', 'registrasiRelawan'));
    }

    public function detail_riwayat_kegiatan_donasi($idDonaturRelawan, $idRegistrasiDonasi){
        $detailRegistrasiDonatur = RegistrasiDonatur::with(['kegiatanDonasi.pantiSosial'])->where('IDRegistrasiDonatur', $idRegistrasiDonasi)->first();

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
        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $FotoDonasi = [
            'pakaian' => 'Image/donasi/pakaian.png',
            'sepatu' => 'Image/donasi/sepatu.png',
            'mainan' => 'Image/donasi/mainan.png',
            'keperluan_ibadah' => 'Image/donasi/keperluan_ibadah.png',
            'buku' => 'Image/donasi/buku.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'keperluan_mandi' => 'Image/donasi/keperluan_mandi.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'alat_tulis' => 'Image/donasi/alat_tulis.png'
        ];
        $hariIndoDonatur = $hari[Carbon::parse($detailRegistrasiDonatur->TanggalDonasi)->format('l')];
        $partitionTanggalDonasi = explode('-', $detailRegistrasiDonatur->TanggalDonasi);
        $detailRegistrasiDonatur->setAttribute('FormatTanggalDonasi', $hariIndoDonatur . ', ' . $partitionTanggalDonasi[2] . ' ' . $bulan[$partitionTanggalDonasi[1]] . ' ' . $partitionTanggalDonasi[0]);

        $detailRegistrasiDonatur->JamDonasi = Carbon::createFromFormat('H:i:s', $detailRegistrasiDonatur->JamDonasi)->format('H:i');

        $donasiItems = explode(',', $detailRegistrasiDonatur->JenisDonasiDidonasikan);
        $detailRegistrasiDonatur->setAttribute('donasiDanGambar', array_map(function($jenis) use ($FotoDonasi){
            return[
                'jenis' => $jenis,
                'image' => $FotoDonasi[$jenis],
            ];
        }, $donasiItems));

        $id = $idDonaturRelawan;
        return view('ProfileDonaturRelawan.detail_riwayat_kegiatan_donasi', compact('id', 'idRegistrasiDonasi', 'detailRegistrasiDonatur'));
    }

    public function detail_riwayat_kegiatan_relawan($idDonaturRelawan, $idRegistrasiRelawan){
        $detailRegistrasiRelawan = RegistrasiRelawan::with(['kegiatanRelawan.pantiSosial'])->where('IDRegistrasiRelawan', $idRegistrasiRelawan)->first();

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
        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $hariIndoRelawan = $hari[Carbon::parse($detailRegistrasiRelawan->TanggalKehadiranRelawan)->format('l')];
        $partitionTanggalRelawan = explode('-', $detailRegistrasiRelawan->TanggalKehadiranRelawan);
        $detailRegistrasiRelawan->setAttribute('FormatTanggalRelawan', $hariIndoRelawan . ', ' . $partitionTanggalRelawan[2] . ' ' . $bulan[$partitionTanggalRelawan[1]] . ' ' . $partitionTanggalRelawan[0]);

        $detailRegistrasiRelawan->kegiatanRelawan->JamMulaiKegiatanRelawan = Carbon::createFromFormat('H:i:s', $detailRegistrasiRelawan->kegiatanRelawan->JamMulaiKegiatanRelawan)->format('H:i');
        $detailRegistrasiRelawan->kegiatanRelawan->JamSelesaiKegiatanRelawan = Carbon::createFromFormat('H:i:s', $detailRegistrasiRelawan->kegiatanRelawan->JamSelesaiKegiatanRelawan)->format('H:i');
        $detailRegistrasiRelawan->setAttribute('FormatJamRelawan', $detailRegistrasiRelawan->kegiatanRelawan->JamMulaiKegiatanRelawan . '-' . $detailRegistrasiRelawan->kegiatanRelawan->JamSelesaiKegiatanRelawan);

        $id = $idDonaturRelawan;

        return view('ProfileDonaturRelawan.detail_riwayat_kegiatan_relawan', compact('id', 'idRegistrasiRelawan', 'detailRegistrasiRelawan'));
    }
}
