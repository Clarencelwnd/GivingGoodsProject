<?php

namespace App\Http\Controllers;

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

class ProfileController extends Controller
{
    public function index(Request $request){
        // nyari data di tabel
        $id = $request->id;
        $jadwalPansos = JadwalOperasional::where('IDPantiSosial', $id)->get();
        $detailPansos = PantiSosial::find($id);
        $userPansos = $detailPansos->User;

        // format jam
        foreach ($jadwalPansos as $jadwal) {
            if($jadwal->JamBukaPantiSosial){
                $jadwal->JamBukaPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamBukaPantiSosial)->format('H:i');
                $jadwal->JamTutupPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamTutupPantiSosial)->format('H:i');
            }
        }

        // pisah array media_sosial dan link_profile
        $mediaSosialPantiSosial = explode(';', $detailPansos->MediaSosialPantiSosial);
        foreach ($mediaSosialPantiSosial as $medsospantisosial) {
            $partition = explode(': ', $medsospantisosial, 2);
            if(count($partition) === 2){
                $media_sosial[] = $partition[0];
                $link_profile[] = $partition[1];
            }
        };

        return view('profile_pansos/profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos', 'media_sosial', 'link_profile'));
    }

    public function edit_view($id){
        // $id = $request->id;
        $jadwalPansos = JadwalOperasional::where('IDPantiSosial', $id)->get();
        $detailPansos = PantiSosial::find($id);
        $userPansos = $detailPansos->User;

        foreach ($jadwalPansos as $jadwal) {
            if($jadwal->JamBukaPantiSosial){
                $jadwal->JamBukaPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamBukaPantiSosial)->format('H:i');
                $jadwal->JamTutupPantiSosial = Carbon::createFromFormat('H:i:s', $jadwal->JamTutupPantiSosial)->format('H:i');
            }
        }

        return view('profile_pansos/edit_profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos'));
    }

    public function edit_profile_logic(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'NamaPantiSosial' => 'required',
            'DeskripsiPantiSosial' => 'required|max:300',
            'NomorTeleponPantiSosial' => 'required|regex:/^\+628\d{9,11}$/',
            'AlamatPantiSosial' => 'required|max:450',
            'LinkGoogleMapsPantiSosial' => 'required|regex:/^https:\/\/maps\.app\.goo\.gl\//',
            'MediaSosialPantiSosial' => 'regex:/^(?=.*:)(?=.*;).+$/'
        ],
        [
            'NamaPantiSosial.required' => 'Nama panti sosial wajib diisi.',
            'DeskripsiPantiSosial.required' => 'Deskripsi panti sosial wajib diisi.',
            'DeskripsiPantiSosial.max' => 'Deskripsi panti sosial maksimal berisi 300 karakter.',
            'NomorTeleponPantiSosial.required' => "Nomor handphone panti sosial wajib diisi.",
            'NomorTeleponPantiSosial.regex' => 'Nomor handphone panti sosial wajib berisi angka yang dimulai dengan +62 diikuti dengan 10 - 12 digit',
            'AlamatPantiSosial.required' => 'Alamat panti sosial wajib diisi.',
            'AlamatPantiSosial.max' => 'Alamat panti sosial maksimal berisi 450 karakter.',
            'LinkGoogleMapsPantiSosial.required' => 'Link google maps alamat panti sosial wajib diisi.',
            'LinkGoogleMapsPantiSosial.regex' => 'Link google maps wajib dengan format -> https://maps.app.goo.gl/',
            'MediaSosialPantiSosial.regex' => 'Harap isi dengan format -> Media Sosial: Link Profile Panti Sosial;'
        ]);

        if(substr_count($request->input('MediaSosialPantiSosial'), ':') !== substr_count($request->input('MediaSosialPantiSosial'), ';')){
            $validator->after(function ($validator){
                $validator->errors()->add('MediaSosialPantiSosial', 'Harap isi dengan format -> Media Sosial: Link Profile Panti Sosial;');
            });
        }

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // update tabel pansos
        PantiSosial::where('IDPantiSosial', $id)->update(
            [
                'NamaPantiSosial' => $request->input('NamaPantiSosial'),
                'NomorRegistrasiPantiSosial' => $request->input('NomorRegistrasiPantiSosial'),
                'DeskripsiPantiSosial' => $request->input('DeskripsiPantiSosial'),
                'NomorTeleponPantiSOsial' => $request->input('NomorTeleponPantiSosial'),
                'WebsitePantiSosial' => $request->input('WebsitePantiSosial'),
                'AlamatPantiSosial' => $request->input('AlamatPantiSosial'),
                'LinkGoogleMapsPantiSosial' => $request->input('LinkGoogleMapsPantiSosial'),
                'MediaSosialPantiSosial' => $request->input('MediaSosialPantiSosial')
            ]
        );

        // update tabel user
        $user = PantiSosial::find($id)->User;
        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', 'Berhasil Diubah');
    }

    public function edit_schedule_logic(Request $request, $id){
        // variabel yang dibutuhkan
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $rules = [];

        // penentuan rules
        foreach($days as $day){
            $rules["jam-buka-".strtolower($day)] = 'required|date_format:H:i';
            $rules["jam-tutup-".strtolower($day)] = 'required|date_format:H:i';
        }

        $validator = Validator::make($request->all(), $rules);

        // error message
        $validator->after(function($validator) use($request, $days){
            foreach($days as $day){
                $jamBuka = $request->input("jam-buka-".strtolower($day));
                $jamTutup = $request->input("jam-tutup-".strtolower($day));
                if($jamBuka > $jamTutup){
                    $validator->errors()->add("jam-tutup-".strtolower($day), "Jam tidak sesuai.");
                }
            }
        });

        // menjalankan error
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // buat/masukkan data baru
        foreach ($days as $day) {
            $jamBuka = $request->input("jam-buka-".strtolower($day));
            $jamTutup = $request->input("jam-tutup-".strtolower($day));

            JadwalOperasional::updateOrCreate(
                [
                    'IDPantiSosial' => $id,
                    'Hari' => $day
                ],
                [
                    'JamBukaPantiSosial' => $jamBuka,
                    'JamTutupPantiSosial' => $jamTutup
                ]
            );
        }

        return redirect()->route('edit_profile.panti_sosial', ['id'=>$id]);
    }

    public function edit_photo_logic(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'LogoPantiSosial' => 'image|mimes:jpg,png,jpeg|max:3000'
        ],
        [
            'image' => 'File yang diunggah harus berupa gambar.',
            'mimes' => 'Foto wajib dengan format jpg, png, atau jpeg.',
            'max' => 'Ukuran foto maksimal adalah 3MB.'
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $original_name = $request->file('LogoPantiSosial')->getClientOriginalName();
        $original_ext = $request->file('LogoPantiSosial')->getClientOriginalExtension();
        $logo_panti_sosial_name = $original_name . time() . '.' . $original_ext;

        $request->file('LogoPantiSosial')->storeAs('public/Profile', $logo_panti_sosial_name);
        $logo_panti_sosial = 'storage/Profile/' . $logo_panti_sosial_name;

        $detailPansos = PantiSosial::find($id);
        $detailPansos->LogoPantiSosial = $logo_panti_sosial;
        $detailPansos->save();

        return redirect()->route('profile.panti_sosial',['id'=>$id]);
    }

    public function change_password_view($id){
        return view('profile_pansos/change_password', compact('id'));
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

        $user = PantiSosial::find($id)->User;
        $user->password = $password;
        $user->save();

        return redirect()->back()->with('success', 'Berhasil Diubah');
    }

    public function logout(){
        Auth::logout();
        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('password'));
        return view('profile_pansos/dummy_home_page_not_login');
    }
}
