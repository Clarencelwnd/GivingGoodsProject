@extends('GeneralPagePantiSosial.templatePage')
@section('title', 'Edit Profil')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/Profile/edit_profile.css')}}">
    {{-- <script src="{{ asset('js/profile.js') }}"></script> --}}
@endsection

@section('content')
    <div class="container" style=" display: flex; justify-content: center; width: 100%; padding: 0;margin: 0;">
        {{-- <div class="row"> --}}
            {{-- LEFT SIDE  --}}
            <div class="left col-sm-2">
                <h4 class="left-title fw-semibold">Pengaturan</h4>
                <img class="profile-pict text-center" src="{{asset($detailPansos->LogoPantiSosial)}}" alt="">
                <a href="#" class="btn btn-block" id="btn-choose-photo">Pilih Foto</a>
                <a href="#" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
                <a href="#" class="btn btn-block" id="btn-logout">Keluar Akun</a>
            </div>

            {{-- RIGHT SIDE  --}}
            <div class="right col-sm-9">
                {{-- <div class="row"> --}}
                    <div class="row container-profile" style="margin-top: 50px; margin-left: 50px;">
                        <form action="{{route('edit_profile_logic.panti_sosial', ['id'=>$id])}}" method="post" class= "form" role="form" autocomplete="off" >
                            @csrf
                            <table class="main-table">
                                <tr>
                                    <td class="left-column-mt col-lg-3">Nama Panti Sosial</td>
                                    <td class="right-column-mt col-lg-6">
                                        <input class= "form-control @error('NamaPantiSosial') is-invalid @enderror" type="text" name="NamaPantiSosial" placeholder="Nama dari panti sosial" value="{{old('NamaPantiSosial', $detailPansos->NamaPantiSosial)}}">
                                        @error('NamaPantiSosial')
                                            <div class="error-msg invalid-feedback fw-normal lh-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3" id="NomorRegistrasiPantiSosial">Nomor Registrasi</td>
                                    <td class="right-column-mt col-lg-6"><input readonly class= "form-control" type="text" name="NomorRegistrasiPantiSosial" value="{{old('NomorRegistrasiPantiSosial', $detailPansos->NomorRegistrasiPantiSosial)}}"></td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">Deskripsi</td>
                                    <td class="small-text-above col-lg-6">
                                        <textarea class= "form-control @error('DeskripsiPantiSosial') is-invalid @enderror" type="text" name="DeskripsiPantiSosial" placeholder="Deskripsi singkat dari panti sosial">{{old('DeskripsiPantiSosial', $detailPansos->DeskripsiPantiSosial ?? '')}}</textarea>
                                        @error('DeskripsiPantiSosial')
                                            <div class="error-msg invalid-feedback fw-normal lh-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="col-lg-6 small-text">maks. 300 karakter</td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3" id="EmailPantiSosial">Email</td>
                                    <td class="right-column-mt col-lg-6"><input readonly class= "form-control" type="text" name="email" value="{{old('email', $userPansos->email)}}"></td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">Nomor Handphone</td>
                                    <td class="right-column-mt col-lg-6">
                                        <input class= "form-control @error('NomorTeleponPantiSosial') is-invalid @enderror" type="text" name="NomorTeleponPantiSosial" placeholder="+62812345678910" value="{{old('NomorTeleponPantiSosial', $detailPansos->NomorTeleponPantiSosial)}}">
                                        @error('NomorTeleponPantiSosial')
                                            <div class="error-msg invalid-feedback fw-normal lh-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">Website</td>
                                    <td class="right-column-mt col-lg-6"><input class= "form-control" type="text" name="WebsitePantiSosial" value="{{old('WebsitePantiSosial', $detailPansos->WebsitePantiSosial)}}" placeholder="www.websitepantisosial.com"></td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">
                                        Alamat Lengkap
                                        <img data-bs-toggle="modal" data-bs-target="#informationModal" id="inf-address" src="{{asset('Image/general/information.png')}}" alt="">
                                    </td>
                                    <td class="small-text-above col-lg-6">
                                        <textarea class= "form-control @error('AlamatPantiSosial') is-invalid @enderror" type="text" name="AlamatPantiSosial" placeholder="Jalan, RT/RW, Kabupaten, Kecamatan, Kota, Provinsi, Kode Pos">{{old('AlamatPantiSosial', $detailPansos->AlamatPantiSosial ?? '')}}</textarea>
                                        @error('AlamatPantiSosial')
                                            <div class="error-msg invalid-feedback fw-normal lh-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="col-lg-6 small-text">maks. 450 karakter</td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">
                                        Lokasi pada Google Maps
                                        <img data-bs-toggle="modal" data-bs-target="#informationModal" id="inf-address" src="{{asset('Image/general/information.png')}}" alt="">
                                    </td>
                                    <td class="right-column-mt col-lg-6">
                                        <input class= "form-control @error('LinkGoogleMapsPantiSosial') is-invalid @enderror" type="text" name="LinkGoogleMapsPantiSosial" value="{{old('LinkGoogleMapsPantiSosial', $detailPansos->LinkGoogleMapsPantiSosial)}}" placeholder="https://maps.app.goo.gl/linkGoogleMaps">
                                        @error('LinkGoogleMapsPantiSosial')
                                            <div class="error-msg invalid-feedback fw-normal lh-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">Media Sosial</td>
                                    <td class="right-column-mt col-lg-6">
                                        <textarea class= "form-control @error('MediaSosialPantiSosial') is-invalid @enderror" type="text" name="MediaSosialPantiSosial" placeholder="Instagram: @username; Facebook: @username;">{{old('MediaSosialPantiSosial', $detailPansos->MediaSosialPantiSosial ?? '')}}</textarea>
                                        @error('MediaSosialPantiSosial')
                                            <div class="error-msg invalid-feedback fw-normal lh-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left-column-mt col-lg-3">Jam Operasional</td>
                                    <td class="right-column-mt col-lg-6" id="jam-operasional">
                                        @if (!($jadwalPansos->firstWhere('Hari', 'Senin')))
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#scheduleModal" class="btn btn-jam-operasional @error('btn-schedule') is-invalid @enderror" id="btn-schedule" name="btn-schedule">Atur Jam Operasional</button>
                                            @error('btn-schedule')
                                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <table class="schedule-table">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="img-cell"><a data-bs-toggle="modal" data-bs-target="#scheduleModal" class="btn-img" id="btn-schedule"><img src="{{asset('Image/general/edit.png')}}" alt="" class="img"></a></td>
                                                </tr>
                                                @php
                                                    $index = 0;
                                                    $total = count($jadwalPansos);
                                                    $first = true;
                                                @endphp
                                                @while ($index < $total)
                                                    @php
                                                        $first_day = $jadwalPansos[$index];
                                                        $last_index = $index;
                                                        while (($last_index < ($total - 1)) && ($jadwalPansos[$last_index+1]->JamBukaPantiSosial === $jadwalPansos[$last_index]->JamBukaPantiSosial) && ($jadwalPansos[$last_index+1]->JamTutupPantiSosial === $jadwalPansos[$last_index]->JamTutupPantiSosial)) {
                                                            $last_index++;
                                                        }
                                                        $last_day = $jadwalPansos[$last_index];
                                                    @endphp
                                                    <tr>
                                                        <td class="row-st">
                                                            @if ($first_day === $last_day)
                                                                {{$first_day->Hari}}
                                                            @else
                                                                {{$first_day->Hari}} - {{$last_day->Hari}}
                                                            @endif
                                                        </td>
                                                        <td class="row-st"> | </td>
                                                        <td class="row-st">
                                                            @if ($jadwalPansos[$last_index]->JamBukaPantiSosial === $jadwalPansos[$last_index]->JamTutupPantiSosial)
                                                                Libur
                                                            @else
                                                                {{$first_day->JamBukaPantiSosial}} - {{$first_day->JamTutupPantiSosial}} WIB
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $index = $last_index+1;
                                                    @endphp
                                                @endwhile
                                            </table>
                                            <input type="hidden" name="btn-schedule" class="@error('btn-schedule') is-invalid @enderror">
                                            @error('btn-schedule')
                                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            {{-- BUTTON  --}}
                            <div class="d-flex justify-content-end" style="margin-bottom: 30px;">
                               <a href="{{route('profile.panti_sosial', ['id'=>$id])}}" class="btn me-2" id="btn-back">Batal</a>
                               <button type="submit" class="btn" id="btn-save"> Simpan Perubahan </button>
                           </div>
                        </form>
                    </div>


                    {{-- MODAL JADWAL OPERASIONAL --}}
                    {{-- <div class="container"> --}}
                        <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header align-items-center border-0 row">
                                        <div class="col">
                                            <h6 class="modal-title" id="scheduleModalLabel">Atur Jam Operasional</h6>
                                        </div>
                                        <div class="col text-end">
                                            <h4 class="close" data-bs-dismiss="modal">&times;</h4>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="modal-description">Jika panti sosial libur, maka atur Jam Buka dan Jam Tutup menjadi 00:00 pada hari tersebut!</h6>
                                        <form action="{{route('edit_schedule_logic.panti_sosial', ['id'=>$id])}}" method="post">
                                            @csrf
                                            <table class="set-schedule-table">
                                                <thead>
                                                    <tr>
                                                        <th>Hari</th>
                                                        <th>Jam Buka (WIB)</th>
                                                        <th>Jam Tutup (WIB)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                                        $jadwalHari = [];
                                                        foreach ($days as $day) {
                                                            $jadwal = $jadwalPansos->where('Hari', $day)->first();
                                                            $jamBuka = $jadwal ? $jadwal->JamBukaPantiSosial : '';
                                                            $jamTutup = $jadwal ? $jadwal->JamTutupPantiSosial : '';
                                                            $jadwalHari[$day] = [
                                                                'jamBuka' => $jamBuka,
                                                                'jamTutup' => $jamTutup
                                                            ];
                                                        }
                                                    @endphp
                                                    @foreach ($jadwalHari as $day => $jadwal)
                                                        <tr>
                                                            <td class="row-sst"><label for="hari-{{strtolower($day)}}" id="day">{{ucwords($day)}}</label></td>
                                                            <td class="row-sst">
                                                                <input type="time" id="jam-buka-{{strtolower($day)}}" name="jam-buka-{{strtolower($day)}}" value="{{$jadwal['jamBuka']}}">
                                                            </td>
                                                            <td class="row-sst">
                                                                <input type="time" id="jam-tutup-{{strtolower($day)}}" name="jam-tutup-{{strtolower($day)}}" value="{{$jadwal['jamTutup']}}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row modal-footer d-flex justify-content-end border-0">
                                                <button type="submit" class="btn" id="btn-save-schedule">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        {{-- </div> --}}

        {{-- MODAL SUCCESSFULLY UPDATE PROFILE  --}}
        {{-- <div class="container"> --}}
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header text-center border-0">
                        <h5 class="modal-title w-100" id="successModalLabel">Berhasil Mengubah Profil</h5>
                    </div>
                    <div class="modal-body" id="successModalBody">
                        <img src="{{asset('Image/general/success.png')}}" alt="">
                    </div>
                </div>
                </div>
            </div>
        {{-- </div> --}}

        {{-- MODAL INFORMATION --}}
        {{-- <div class="container"> --}}
            <div class="modal fade" id="informationModal" tabindex="-1" aria-labelledby="informationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header text-center border-0">
                        <div class="modal-title w-100" id="informationModalLabel">Mengapa kami membutuhkan alamat lengkap & lokasi Anda pada Google Maps?</div>
                    </div>
                    <div class="modal-body" id="informationModalBody">
                        Kami membutuhkan alamat Anda untuk membantu kami dalam menghitung jarak Anda dengan panti sosial yang terdaftar di situs web ini. Dengan mengetahui lokasi Anda, kami dapat memastikan bahwa sumbangan dan bantuan Anda dapat langsung disalurkan ke panti sosial terdaftar di sekitar Anda. Privasi dan keamanan informasi pribadi Anda adalah prioritas kami.
                    </div>
                </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>

    @if(session('success'))
        <script> var url = "{{route('profile.panti_sosial', ['id'=>$id])}}" </script>
        <script src="{{ asset('js/edit_profile.js') }}"></script>
    @endif
@endsection
