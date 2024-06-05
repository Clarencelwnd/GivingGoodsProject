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
                <img class="profile-pict text-center img-fluid" src="{{asset($detailDR->FotoDonaturRelawan)}}" alt="">
                <form id="photo" action="{{route('edit_photo_logic.donatur_relawan', ['id'=>$id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="FotoDonaturRelawan" id="input_photo" class="file-choose-photo" onchange="document.getElementById('photo').submit()">
                    @error('FotoDonaturRelawan')
                    <label class="error-msg invalid-feedback fw-normal lh-1">
                        {{$message}}
                    </label>
                    @enderror
                    <button type="button" for="FotoDonaturRelawan" class="btn btn-block @error('FotoDonaturRelawan') is-invalid @enderror" id="btn-choose-photo" onclick="document.getElementById('input_photo').click();">Pilih Foto</button>
                </form>
                <a href="{{route('change_password.donatur_relawan', ['id'=>$id])}}" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
                <a href="#" class="btn btn-block" id="btn-history">Riwayat Kegiatan</a>
                <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn btn-block" id="btn-logout">Keluar Akun</a>
            </div>

            <div class="right col-sm-9">
                @if (!$detailDR->LinkGoogleMapsDonaturRelawan)
                <div class="container information-button">
                    <div class="row">
                        <div class="alert alert-light" role="alert">
                            <img id="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
                            <p>Lengkapi profil Anda untuk pengalaman yang lebih baik.</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row">
                    <a href="{{route('edit_profile.donatur_relawan', ['id'=>$id])}}" class="btn btn-block" id="btn-edit">Ubah Biodata</a>
                    <table class="main-table">
                        <tr>
                            <td class="left-column-mt">Nama Lengkap</td>
                            <td class="right-column-mt"> {{$detailDR->NamaDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Tanggal Lahir</td>
                            <td class="right-column-mt"> {{$detailDR->TanggalLahirDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Jenis Kelamin</td>
                            <td class="right-column-mt"> {{$detailDR->JenisKelaminDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Email</td>
                            <td class="right-column-mt"> {{$userDR->email}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Alamat Lengkap</td>
                            <td class="right-column-mt"> {{$detailDR->AlamatDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt">Lokasi pada Google Maps</td>
                            <td class="right-column-mt"> {{$detailDR->LinkGoogleMapsDonaturRelawan}}</td>
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
                                <button  onclick="window.location.href='{{route('logout.donatur_relawan')}}'" type="button" class="btn" id="btn-yes-logout">Ya, Keluar</button>
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
