@extends('GeneralPageDonaturRelawan.templateDonaturRelawan')

@section('title', 'Ubah Kata Sandi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{asset('css/ProfileDonaturRelawan/change_password.css')}}">
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
@endsection

@section('content')
    <div class="container">
        <div class="card-body">
            <h2 class="desc-change-pass1">Ubah Kata Sandi</h2>
            <div class="desc-change-pass2">Atur ulang kata sandi</div>
            <div class="desc-change-pass3" >Buat kata sandi baru yang kuat untuk akunmu</div>
            <form action="{{route('change_password_logic.donatur_relawan', ['id'=>$id])}}" class= "form" role="form" autocomplete="off" method="post">
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
                    <div class="col col-change">
                        <button type="button" class="btn" id="btn-change" data-bs-dismiss="modal">Lanjut Ubah</button>
                    </div>
                    <div class="col col-profile">
                        <button  onclick="window.location.href='{{route('profile.donatur_relawan', ['id'=>$id])}}'" type="button" class="btn" id="btn-profile">Keluar</button>
                    </div>
                </div>
            </div>
            </div>
        </div>

        {{-- MODAL SUCCESSFULLY CHANGE PASSWORD  --}}
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

    @if(session('success'))
        <script> var url = "{{route('profile.donatur_relawan', ['id'=>$id])}}" </script>
        <script src="{{ asset('js/ProfileDonaturRelawan/change_password.js') }}"></script>
    @endif
@endsection
