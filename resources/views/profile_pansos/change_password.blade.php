@extends('GeneralPagePantiSosial.templatePage')
@section('title', 'Profil Panti Sosial')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/Profile/change_password.css')}}">
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@section('content')
    <div class=" container justify-content-center">
        <div class="card-header">
            <h5 class="title">Ubah Kata Sandi</h5>
        </div>
        <div class="card-body">
            <div class="desc-change-pass1">Atur ulang kata sandi</div>
            <div class="desc-change-pass2" >Buat kata sandi baru yang kuat untuk akunmu</div>
            <form action="{{route('change_password_logic.panti_sosial', ['id'=>$id])}}" class= "form" role="form" autocomplete="off" method="post">
                @csrf
                <div class="form-group">
                    <label for="password" id="password">Kata Sandi Baru</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <div class="error-msg invalid-feedback fw-normal lh-1">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" id="password">Ketik Ulang Kata Sandi Baru</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="error-msg invalid-feedback fw-normal lh-1">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end" id="button-style">
                    <a data-bs-toggle="modal" data-bs-target="#exitChangePasswordModal" class="btn btn-cancel" id="exitChangePassword">Batal</a>
                    <button type="submit" class="btn" id="btn-save">Simpan Perubahan </button>
                </div>
            </form>
        </div>

        {{-- MODAL CANCEL CHANGE PASSWORD --}}
        <div class="container">
            <div class="modal fade" id="exitChangePasswordModal" tabindex="-1" aria-labelledby="exitChangePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header text-center border-0">
                        <h5 class="modal-title w-100" id="exitChangePasswordModalLabel">Keluar dari Halaman ini?</h5>
                    </div>
                    <div class="modal-body">
                        Kalau keluar sekarang, kata sandi yang Anda ubah tidak akan tersimpan.
                    </div>
                    <div class="row modal-footer align-content-center justify-content-center border-0">
                        <div class="col">
                            <button type="button" class="btn" id="btn-change" data-bs-dismiss="modal">Lanjut Ubah</button>
                            <button  onclick="window.location.href='{{route('profile.panti_sosial', ['id'=>$id])}}'" type="button" class="btn" id="btn-profile">Keluar</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        {{-- MODAL SUCCESSFULLY CHANGE PASSWORD  --}}
        <div class="container">
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header text-center border-0">
                        <h5 class="modal-title w-100" id="successModalLabel">Berhasil Mengubah Kata Sandi</h5>
                    </div>
                    <div class="modal-body">
                        <img src="{{asset('Image/general/success.png')}}" alt="">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <script> var url = "{{route('profile.panti_sosial', ['id'=>$id])}}" </script>
        <script src="{{ asset('js/change_password.js') }}"></script>
    @endif

@endsection
