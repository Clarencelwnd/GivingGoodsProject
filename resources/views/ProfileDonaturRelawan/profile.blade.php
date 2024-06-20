@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Profil Pengguna')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/Profile/profile.css')}}">
@endsection

@section('content')
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
                <a href="{{route('riwayat_kegiatan', ['id'=>$id])}}" class="btn btn-block" id="btn-history">Riwayat Kegiatan</a>
                <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn btn-block" id="btn-logout">Keluar Akun</a>
            </div>

            <div class="right col-sm-9">
                @if (!$detailDR->LinkGoogleMapsDonaturRelawan)
                    <div class="row">
                        <div class="alert alert-light" role="alert">
                            <img class="information-icon" src="{{ asset('Image/general/information.png') }}" alt="information">
                            <p>Lengkapi profil Anda untuk pengalaman yang lebih baik.</p>
                        </div>
                    </div>
                @endif

                <div class="row container-profile" style="margin-left: 50px; overflow:hidden" >
                    <a href="{{route('edit_profile.donatur_relawan', ['id'=>$id])}}" class="btn btn-block" id="btn-edit">Ubah Biodata</a>
                    <table class="main-table">
                        <tr>
                            <td class="left-column-mt col-lg-4">Nama Lengkap</td>
                            <td class="right-column-mt col-lg-5"> {{$detailDR->NamaDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Tanggal Lahir</td>
                            <td class="right-column-mt col-lg-5"> {{$detailDR->TanggalLahirDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Jenis Kelamin</td>
                            <td class="right-column-mt col-lg-5"> {{$detailDR->JenisKelaminDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">Email</td>
                            <td class="right-column-mt col-lg-5"> {{$userDR->email}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">
                                Alamat Lengkap
                                <img data-bs-toggle="modal" data-bs-target="#informationModal" class="information-icon" id="inf-address" src="{{asset('Image/general/information.png')}}" alt="">
                            </td>
                            <td class="right-column-mt col-lg-5"> {{$detailDR->AlamatDonaturRelawan}}</td>
                        </tr>
                        <tr>
                            <td class="left-column-mt col-lg-4">
                                Lokasi pada Google Maps
                                <img data-bs-toggle="modal" data-bs-target="#informationModal" class="information-icon" id="inf-address" src="{{asset('Image/general/information.png')}}" alt="">
                            </td>
                            <td class="right-column-mt col-lg-5"> {{$detailDR->LinkGoogleMapsDonaturRelawan}}</td>
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
                            <h6 class="modal-title w-100" id="logoutModalLabel">Keluar dari Akun</h6>
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

            {{-- MODAL INFORMATION --}}
            <div class="container">
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></>
    <script src="{{ asset('js/Profile/profile.js') }}"></script>
@endsection
