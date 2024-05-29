<?php

namespace App\Http\Controllers;

use App\Models\JadwalOperasional;
use App\Models\PantiSosial;
use App\Models\RegistrasiRelawan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        return view('profile_pansos/profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos'));
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

        // tarik data terbaru
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

        return view('profile_pansos/profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos'));
    }

    public function edit_schedule_logic(Request $request, $id){
        // variabel yan gdibutuhkan
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
            // dd($validator);
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

        return redirect()->back();
    }

    public function edit_photo_logic(Request $request, $id){
        dd($id);
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

        // tarik data terbaru
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

        return view('profile_pansos/profile', compact('id', 'jadwalPansos', 'detailPansos', 'userPansos'));
    }

}
