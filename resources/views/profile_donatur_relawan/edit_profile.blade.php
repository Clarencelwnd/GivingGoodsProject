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
    <div class="container">
        <div class="row">
            {{-- LEFT SIDE  --}}
            <div class="left col-sm-3">
                <h4 class="left-title fw-semibold">Pengaturan</h4>
                <img class="profile-pict text-center img-fluid" src="{{asset($detailDR->FotoDonaturRelawan)}}" alt="">
                <a href="#" class="btn btn-block" id="btn-choose-photo">Pilih Foto</a>
                <a href="#" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
                <a href="#" class="btn btn-block" id="btn-history">Riwayat Kegiatan</a>
                <a href="#" class="btn btn-block" id="btn-logout">Keluar Akun</a>
            </div>

            {{-- RIGHT SIDE  --}}
            <div class="right col-sm-9">
                <div class="row">
                    <form action="{{route('edit_profile_logic.donatur_relawan', ['id'=>$id])}}" method="post" class= "form" role="form" autocomplete="off" >
                        @csrf
                        <table class="main-table">
                            <tr>
                                <td class="left-column-mt col-lg-4">Nama Lengkap</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="NamaDonaturRelawan" value="{{old('NamaDonaturRelawan', $detailDR->NamaDonaturRelawan)}}"></td>
                            </tr>
                            <tr>
                                <td class="left-column-mt col-lg-4">Tanggal Lahir</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="TanggalLahirDonaturRelawan" value="{{old('TanggalLahirDonaturRelawan', $detailDR->TanggalLahirDonaturRelawan)}}"></td>
                            </tr>
                            <tr>
                                <td class="left-column-mt col-lg-4">Jenis Kelamin</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="JenisKelaminDonaturRelawan" value="{{old('JenisKelaminDonaturRelawan', $detailDR->JenisKelaminDonaturRelawan)}}"></td>
                            </tr>
                            <tr>
                                <td class="left-column-mt col-lg-4">Email</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="email" value="{{old('email', $userDR->email)}}"></td>
                            </tr>
                            <tr>
                                <td class="left-column-mt col-lg-4">Nomor HP</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="NomorTeleponDonaturRelawan" value="{{old('NomorTeleponDonaturRelawan', $detailDR->NomorTeleponDonaturRelawan)}}"></td>
                            </tr>
                            <tr>
                                <td class="left-column-mt col-lg-4">Alamat Lengkap</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="AlamatDonaturRelawan" value="{{old('AlamatDonaturRelawan', $detailDR->AlamatDonaturRelawan)}}"></td>
                            </tr>
                            <tr>
                                <td class="left-column-mt col-lg-4">Lokasi pada Google Maps</td>
                                <td class="right-column-mt col-lg-5"><input class= "form-control" type="text" name="LinkGoogleMapsDonaturRelawan" value="{{old('LinkGoogleMapsDonaturRelawan', $detailDR->LinkGoogleMapsDonaturRelawan)}}"></td>
                            </tr>
                        </table>

                        {{-- BUTTON  --}}
                        <div class="d-flex justify-content-end">
                            <a href="{{route('profile.donatur_relawan', ['id'=>$id])}}" class="btn" id="btn-back">Batal</a>
                            <button type="submit" class="btn" id="btn-save">Simpan Perubahan </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
