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
        <div class="left col-sm-2 d-none d-md-block">
            <h4 class="left-title fw-semibold justify-content-center">Pengaturan</h4>
            <img class="profile-pict" src="{{asset('Image/login_reset_password/bg1.png')}}" alt="">
            <a href="#" class="btn btn-block" id="btn-choose-photo">Pilih Foto</a>
            <a href="#" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
            <a href="#" class="btn btn-block" id="btn-logout">Keluar Akun</a>
        </div>

        <div class="right col-lg-10 d-none d-md-block">
            <div class="row g-0">
                <form action="" method="post">
                    @csrf
                    <table class="main-table">
                        <tr>
                            <td class="left-column-mt">Nama Panti Sosial</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('NamaPantiSosial', $detailPansos->NamaPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Nomor Registrasi</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('NomorRegistrasiPantiSosial', $detailPansos->NomorRegistrasiPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Deskripsi</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('DeskripsiPantiSosial', $detailPansos->DeskripsiPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Email</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('email', $userPansos->email)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Nomor HP</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('NomorTeleponPantiSosial', $detailPansos->NomorTeleponPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Website</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('WebsitePantiSosial', $detailPansos->WebsitePantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Alamat Lengkap</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('AlamatPantiSosial', $detailPansos->AlamatPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Lokasi pada Google Maps</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('LinkGoogleMapsPantiSosial', $detailPansos->LinkGoogleMapsPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Media Sosial</td>
                            <td><input class= "right-column-mt" type="text" value="{{old('MediaSosialPantiSosial', $detailPansos->MediaSosialPantiSosial)}}"></td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Jam Operasional</td>
                            <td class="right-column-mt" id="jam-operasional">
                                @if (!$detailPansos->LinkGoogleMapsPantiSosial)
                                    <a href="#" class="btn btn-block" id="btn-jam-operasional">Atur Jam Operasional</a>
                                @else
                                    <table class="schedule-table">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="img-cell"><img src="{{asset('Image/general/edit.png')}}" alt="" class="img"></td>

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
                                                        {{Carbon::parse($first_day->JamBukaPantiSosial)->format('H:i')}} - {{Carbon::parse($first_day->JamTutupPantiSosial)->format('H:i')}} WIB
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
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
