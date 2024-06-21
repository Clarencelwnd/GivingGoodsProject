@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Profil Pengguna')

@section('stylesheets')
    @parent
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="{{asset('css/Profile/edit_profile.css')}}">
@endsection

@section('content')
<div class="container">
    {{-- LEFT SIDE  --}}
    <div class="left col-sm-2">
        <h4 class="left-title fw-semibold">Pengaturan</h4>
        <img class="profile-pict text-center" src="{{asset($detailDR->FotoDonaturRelawan)}}" alt="">
        <a href="#" class="btn btn-block" id="btn-choose-photo">Pilih Foto</a>
        <a href="#" class="btn btn-block" id="btn-change-password">Ubah Kata Sandi</a>
        <a href="#" class="btn btn-block" id="btn-history">Riwayat Kegiatan</a>
        <a href="#" class="btn btn-block" id="btn-logout">Keluar Akun</a>
    </div>

    {{-- RIGHT SIDE  --}}
    <div class="right col-sm-9">
        <div class="row container-profile" style="margin-top: 50px; margin-left: 50px;" >
            <form action="{{route('edit_profile_logic.donatur_relawan', ['id'=>$id])}}" method="post" class= "form" role="form" autocomplete="off" >
                @csrf
                <table class="main-table">
                    <tr>
                        <td class="left-column-mt col-lg-3">Nama Lengkap</td>
                        <td class="right-column-mt col-lg-6">
                            <input class= "form-control @error('NamaDonaturRelawan') is-invalid @enderror" type="text" name="NamaDonaturRelawan" placeholder="Nama dari donatur atau relawan" value="{{old('NamaDonaturRelawan', $detailDR->NamaDonaturRelawan)}}">
                            @error('NamaDonaturRelawan')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="left-column-mt col-lg-3">Tanggal Lahir</td>
                        <td class="right-column-mt col-lg-6">
                            <input class= "form-control @error('TanggalLahirDonaturRelawan') is-invalid @enderror" type="date" id="datepicker" name="TanggalLahirDonaturRelawan" value="{{old('TanggalLahirDonaturRelawan', $detailDR->TanggalLahirDonaturRelawan)}}">
                            @error('TanggalLahirDonaturRelawan')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="left-column-mt col-lg-3">Jenis Kelamin</td>
                        <td class="right-column-mt col-lg-6">
                            <input class= "form-control @error('JenisKelaminDonaturRelawan') is-invalid @enderror" type="text" name="JenisKelaminDonaturRelawan" placeholder="Laki-laki atau Perempuan" value="{{old('JenisKelaminDonaturRelawan', $detailDR->JenisKelaminDonaturRelawan)}}">
                            @error('JenisKelaminDonaturRelawan')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="left-column-mt col-lg-3" id="EmailDonaturRelawan">Email</td>
                        <td class="right-column-mt col-lg-6"><input readonly class= "form-control" type="text" name="email" value="{{old('email', $userDR->email)}}"></td>
                    </tr>
                    <tr>
                        <td class="left-column-mt col-lg-3">Nomor Handphone</td>
                        <td class="right-column-mt col-lg-6">
                            <input class= "form-control @error('NomorTeleponDonaturRelawan') is-invalid @enderror" type="text" name="NomorTeleponDonaturRelawan" placeholder="+62812345678910" value="{{old('NomorTeleponDonaturRelawan', $detailDR->NomorTeleponDonaturRelawan)}}">
                            @error('NomorTeleponDonaturRelawan')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="left-column-mt col-lg-3">
                            Alamat Lengkap
                            <img data-bs-toggle="modal" data-bs-target="#informationModal" class="information-icon" id="inf-address" src="{{asset('Image/general/information.png')}}" alt="">
                        </td>
                        <td class="small-text-above col-lg-6">
                            <textarea class= "form-control @error('AlamatDonaturRelawan') is-invalid @enderror" type="text" name="AlamatDonaturRelawan" placeholder="Jalan, RT/RW, Kabupaten, Kecamatan, Kota, Provinsi, Kode Pos">{{old('AlamatDonaturRelawan', $detailDR->AlamatDonaturRelawan)}}</textarea>
                            @error('AlamatDonaturRelawan')
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
                            <img data-bs-toggle="modal" data-bs-target="#informationModal" class="information-icon" id="inf-address" src="{{asset('Image/general/information.png')}}" alt="">
                        </td>
                        <td class="right-column-mt col-lg-6">
                            <input class= "form-control @error('LinkGoogleMapsDonaturRelawan') is-invalid @enderror" type="text" name="LinkGoogleMapsDonaturRelawan" placeholder="https://maps.app.goo.gl/linkGoogleMaps" value="{{old('LinkGoogleMapsDonaturRelawan', $detailDR->LinkGoogleMapsDonaturRelawan)}}">
                            @error('LinkGoogleMapsDonaturRelawan')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                        </td>
                    </tr>
                </table>

                {{-- BUTTON  --}}
                <div class="mt-5 d-flex justify-content-end" style="margin-bottom: 30px;">
                        <a href="{{ route('profile.donatur_relawan', ['id' => $id]) }}" class="btn me-2" id="btn-back">Batal</a>
                        <button type="submit" class="btn" id="btn-save">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL SUCCESSFULLY UPDATE PROFILE  --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header text-center border-0">
                <h5 class="modal-title w-100" id="successModalLabel">Berhasil Mengubah Profil</h5>
            </div>
            <div class="modal-body">
                <img src="{{asset('Image/general/success.png')}}" alt="">
            </div>
        </div>
        </div>
    </div>

    {{-- MODAL INFORMATION --}}
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
</div>

@if (session('success'))
    <script> var url = "{{route('profile.donatur_relawan', ['id'=>$id])}}" </script>
    <script src="{{ asset('js/Profile/edit_profile.js') }}"></script>
@endif
@endsection
