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
    <div class="container">
        <div class="row">
            <div class="left col-sm-3">
                <h4 class="left-title fw-semibold">Pengaturan</h4>
                <img class="profile-pict text-center img-fluid" src="{{asset($detailPansos->LogoPantiSosial)}}" alt="">
                <form id="photo" action="{{route('edit_photo_logic.panti_sosial', ['id'=>$id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="LogoPantiSosial" id="input_photo" class="file-choose-photo" onchange="document.getElementById('photo').submit()">
                    @error('LogoPantiSosial')
                        <label class="error-msg invalid-feedback fw-normal lh-1">
                            {{$message}}
                        </label>
                    @enderror
                    <button type="button" for="LogoPantiSosial" class="btn btn-block @error('LogoPantiSosial') is-invalid @enderror" id="btn-choose-photo" onclick="document.getElementById('input_photo').click();">Pilih Foto</button>
                </form>
                <a href="{{route('change_password.panti_sosial', ['id'=>$id])}}" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
                <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn btn-block" id="btn-logout">Keluar Akun</a>
            </div>

            <div class="right col-sm-9">
                @if (!$detailPansos->LinkGoogleMapsPantiSosial)
                    <div class="row">
                        <div class="alert alert-light" role="alert">
                            <img id="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
                            <p>Lengkapi profil panti sosial untuk memberikan informasi yang lebih baik kepada calon donatur/relawan.</p>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <a href="{{route('edit_profile.panti_sosial', ['id'=>$id])}}" class="btn btn-block" id="btn-edit">Ubah Biodata</a>
                    <table class="main-table">
                        <tr>
                            <td class="left-column-mt col-lg-4">Nama Panti Sosial</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->NamaPantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Nomor Registrasi</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->NomorRegistrasiPantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Deskripsi</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->DeskripsiPantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Email</td>
                            <td class="right-column-mt col-lg-5"> {{$userPansos->email}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Nomor HP</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->NomorTeleponPantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Website</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->WebsitePantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Alamat Lengkap</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->AlamatPantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Lokasi pada Google Maps</td>
                            <td class="right-column-mt col-lg-5"> {{$detailPansos->LinkGoogleMapsPantiSosial}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Media Sosial</td>
                            <td class="right-column-mt col-lg-5">
                                @php
                                    $count = count($media_sosial);
                                @endphp
                                @for ($i = 0; $i < $count; $i++)
                                    {{$media_sosial[$i]}}: {{$link_profile[$i]}}<br>
                                @endfor
                            </td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Jam Operasional</td>
                            <td class="right-column-mt col-lg-5">
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

            {{-- MODAL LOGOUT  --}}
            <div class="container">
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center">
                        <div class="modal-header text-center border-0">
                            <h5 class="modal-title w-100" id="logoutModalLabel">Keluar dari Akun</h5>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin keluar dari Akun Anda?
                        </div>
                        <div class="row modal-footer align-content-center justify-content-center border-0">
                            <div class="col-change">
                                <button type="button" class="btn" id="btn-back" data-bs-dismiss="modal">Kembali</button>
                            </div>
                            <div class="col-profile">
                                <button  onclick="window.location.href='{{route('logout.panti_sosial')}}'" type="button" class="btn" id="btn-yes-logout">Ya, Keluar</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
