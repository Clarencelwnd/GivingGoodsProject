@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/edit_profile.css')}}">
</head>
<body>
    <div class="row g-0">
        {{-- LEFT SIDE  --}}
        <div class="left col-sm-2 d-none d-md-block">
            <h4 class="left-title fw-semibold justify-content-center">Pengaturan</h4>
            <img class="profile-pict" src="{{asset('Image/login_reset_password/bg1.png')}}" alt="">
            <a href="#" class="btn btn-block" id="btn-choose-photo">Pilih Foto</a>
            <a href="#" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
            <a href="#" class="btn btn-block" id="btn-logout">Keluar Akun</a>
        </div>

        {{-- RIGHT SIDE  --}}
        <div class="right col-lg-10 d-none d-md-block">
            <div class="row g-0">
                <form action="{{route('edit_profile_logic', ['id'=>$id])}}" method="post" class= "form" role="form" autocomplete="off" >
                    @csrf
                    <table class="main-table">
                        <tr class="form-group">
                            <td class="left-column-mt">Nama Panti Sosial</td>
                            <td><input class= "right-column-mt form-control" type="text" name="NamaPantiSosial" value="{{old('NamaPantiSosial', $detailPansos->NamaPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Nomor Registrasi</td>
                            <td><input class= "right-column-mt form-control" type="text" name="NomorRegistrasiPantiSosial" value="{{old('NomorRegistrasiPantiSosial', $detailPansos->NomorRegistrasiPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Deskripsi</td>
                            <td><input class= "right-column-mt form-control" type="text" name="DeskripsiPantiSosial" value="{{old('DeskripsiPantiSosial', $detailPansos->DeskripsiPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Email</td>
                            <td><input class= "right-column-mt form-control" type="text" name="email" value="{{old('email', $userPansos->email)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Nomor HP</td>
                            <td><input class= "right-column-mt form-control" type="text" name="NomorTeleponPantiSosial" value="{{old('NomorTeleponPantiSosial', $detailPansos->NomorTeleponPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Website</td>
                            <td><input class= "right-column-mt form-control" type="text" name="WebsitePantiSosial" value="{{old('WebsitePantiSosial', $detailPansos->WebsitePantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Alamat Lengkap</td>
                            <td><input class= "right-column-mt form-control" type="text" name="AlamatPantiSosial" value="{{old('AlamatPantiSosial', $detailPansos->AlamatPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Lokasi pada Google Maps</td>
                            <td><input class= "right-column-mt form-control" type="text" name="LinkGoogleMapsPantiSosial" value="{{old('LinkGoogleMapsPantiSosial', $detailPansos->LinkGoogleMapsPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Media Sosial</td>
                            <td><input class= "right-column-mt form-control" type="text" name="MediaSosialPantiSosial" value="{{old('MediaSosialPantiSosial', $detailPansos->MediaSosialPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Jam Operasional</td>
                            <td class="right-column-mt" id="jam-operasional">
                                @if (!$detailPansos->LinkGoogleMapsPantiSosial)
                                    <a data-bs-toggle="modal" data-bs-target="#scheduleModal" class="btn btn-block" id="btn-jam-operasional">Atur Jam Operasional</a>
                                @else
                                    <table class="schedule-table">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="img-cell"><a data-bs-toggle="modal" data-bs-target="#scheduleModal" id="btn-img"><img src="{{asset('Image/general/edit.png')}}" alt="" class="img"></a></td>
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
                                                <td> | </td>
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
                                @endif
                            </td>
                        </tr>
                    </table>

                    {{-- BUTTON  --}}
                    <div class="row justify-content-end" id="button-style">
                        <div class="col-2">
                            <a href="{{route('profile', ['id'=>$id])}}" class="btn btn-block" id="btn-back">Batal</a>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn px-4 me-md-2 fw-normal" id="btn-save">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>

                {{-- MODAL JADWAL OPERASIONAL --}}
                <div class="container">
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
                                    <form action="{{route('edit_schedule_logic', ['id'=>$id])}}" method="post">
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
                                                        <td class="row-sst"><input type="time" id="jam-buka-{{strtolower($day)}}" name="jam-buka-{{strtolower($day)}}" value="{{$jadwal['jamBuka']}}"></td>
                                                        <td class="row-sst"><input type="time" id="jam-tutup-{{strtolower($day)}}" name="jam-tutup-{{strtolower($day)}}" value="{{$jadwal['jamTutup']}}" class="@error('jam-tutup-{{strtolower($day)}}') is-invalid @enderror">
                                                            @error('jam-tutup-{{strtolower($day)}}')
                                                                <label class="error-msg invalid-feedback fw-normal lh-1">
                                                                    {{$message}}
                                                                </label>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row modal-footer align-content-center justify-content-center border-0">
                                            <div class="col-change">
                                                <button type="submit" class="btn" id="btn-save-schedule">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/edit_profile.js') }}"></script>
</body>
</html>
