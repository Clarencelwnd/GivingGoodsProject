<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/change_password.css')}}">
</head>
<body>
    <div class="card container justify-content-center">
        <div class="card-header">
            <p class="position">Profil > Ubah Kata Sandi</p>
            <h5 class="title">Ubah Kata Sandi</h5>
        </div>
        <div class="card-body">
            <div class="desc-change-pass1">Atur ulang kata sandi</div>
            <div class="desc-change-pass2" >Buat kata sandi baru yang kuat untuk akunmu</div>
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
                <div class="save-cancel d-flex justify-content-end">
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
                        <div class="col-change">
                            <button type="button" class="btn" id="btn-change" data-bs-dismiss="modal">Lanjut Ubah</button>
                        </div>
                        <div class="col-profile">
                            <button  onclick="window.location.href='{{route('profile.donatur_relawan', ['id'=>$id])}}'" type="button" class="btn" id="btn-profile">Keluar</button>
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
                        <h5 class="modal-title w-100" id="successModalLabel">Berhasil Diubah</h5>
                    </div>
                    {{-- <div class="modal-body">
                        Kalau keluar sekarang, kata sandi yang Anda ubah tidak akan tersimpan.
                    </div>
                    <div class="row modal-footer align-content-center justify-content-center border-0">
                        <div class="col-change">
                            <button type="button" class="btn" id="btn-change" data-bs-dismiss="modal">Lanjut Ubah</button>
                        </div>
                        <div class="col-profile">
                            <button  onclick="window.location.href='{{route('profile', ['id'=>$id])}}'" type="button" class="btn" id="btn-profile">Keluar</button>
                        </div>
                    </div> --}}
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @if(session('success'))
        <script src="{{ asset('js/change_password.js') }}"></script>
    @endif
</body>
</html>
