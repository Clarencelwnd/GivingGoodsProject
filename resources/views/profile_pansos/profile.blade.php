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
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
</head>
<body>
    <div class="row g-0">
        <div class="left col-sm-2 d-none d-md-block">
            <h4 class="left-title fw-semibold justify-content-center">Pengaturan</h4>
            <img class="profile-pict" src="{{asset('Image/login_reset_password/bg1.png')}}" alt="">
            <a href="#" class="btn btn-block" id="btn-choose-photo">Pilih Foto</a>
            <a href="#" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
            <a href="#" class="btn btn-block" id="btn-logout">Keluar Akun</a>
        </div>

        <div class="right col-lg-10 d-none d-md-block">
            @if (!$detailPansos->LinkGoogleMapsPantiSosial)
            <div class="container information-button">
                {{-- <div class="overlay" id="overlay"></div> --}}
                <div class="row">
                    <div class="alert alert-light" role="alert">
                        <img id="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
                        <p>Lengkapi profil panti sosial untuk memberikan informasi yang lebih baik kepada calon donatur/relawan.</p>
                    </div>
                </div>
            </div>
            @endif

            <div class="row g-0">
                <div class="col-lg-3 d-none d-md-block">
                    <a href="{{route('edit_profile',['id'=>$id])}}" class="btn btn-block" id="btn-edit">Ubah Biodata</a>
                </div>
                <table class="main-table">
                    <tr>
                        <td class="left-column-mt">Nama Panti Sosial</td>
                        <td class="right-column-mt"> {{$detailPansos->NamaPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Nomor Registrasi</td>
                        <td class="right-column-mt"> {{$detailPansos->NomorRegistrasiPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Deskripsi</td>
                        <td class="right-column-mt"> {{$detailPansos->DeskripsiPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Email</td>
                        <td class="right-column-mt"> {{$userPansos->email}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Nomor HP</td>
                        <td class="right-column-mt"> {{$detailPansos->NomorTeleponPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Website</td>
                        <td class="right-column-mt"> {{$detailPansos->WebsitePantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Alamat Lengkap</td>
                        <td class="right-column-mt"> {{$detailPansos->AlamatPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Lokasi pada Google Maps</td>
                        <td class="right-column-mt"> {{$detailPansos->LinkGoogleMapsPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Media Sosial</td>
                        <td class="right-column-mt"> {{$detailPansos->MediaSosialPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column-mt">Jam Operasional</td>
                        <td class="right-column-mt">
                            <table class="schedule-table">
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
                                                {{-- {{Carbon::parse($first_day->JamBukaPantiSosial)->format('H:i')}} - {{Carbon::parse($first_day->JamTutupPantiSosial)->format('H:i')}} WIB --}}
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $index = $last_index+1;
                                    @endphp
                                @endwhile
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
