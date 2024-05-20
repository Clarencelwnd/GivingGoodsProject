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
            <div class="row g-0">
                <div class="col-lg-3 d-none d-md-block">
                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="btn btn-block" id="btn-edit">Ubah Biodata</a>
                        </div>
                    </div>
                </div>
                <table class="main-table">
                    <tr>
                        <td class="left-column">Nama Panti Sosial</td>
                        <td class="right-column"> {{$detailPansos->NamaPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Nomor Registrasi</td>
                        <td class="right-column"> {{$detailPansos->NomorRegistrasiPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Deskripsi</td>
                        <td class="right-column"> {{$detailPansos->DeskripsiPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Email</td>
                        <td class="right-column"> {{$userPansos->email}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Nomor HP</td>
                        <td class="right-column"> {{$detailPansos->NomorTeleponPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Website</td>
                        <td class="right-column"> {{$detailPansos->WebsitePantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Alamat Lengkap</td>
                        <td class="right-column"> {{$detailPansos->AlamatPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Lokasi pada Google Maps</td>
                        <td class="right-column"> {{$detailPansos->LinkGoogleMapsPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Media Sosial</td>
                        <td class="right-column"> {{$detailPansos->MediaSosialPantiSosial}}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Jam Operasional</td>
                        <td class="right-column">
                            <table class="schedule-table">
                                @foreach ($jadwalPansos as $jadwal)
                                    <tr>
                                        <td>{{$jadwal->Hari}}</td>
                                        <td>{{$jadwal->JamBukaPantiSosial}}</td>
                                        <td>{{$jadwal->JamTutupPantiSosial}}</td>
                                    </tr>
                                @endforeach
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
