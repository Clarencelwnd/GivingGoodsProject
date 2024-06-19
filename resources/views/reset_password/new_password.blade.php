<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/new_password.css')}}">
    <script src="{{ asset('js/new_password.js') }}"></script>
</head>
<body>
    <div class="row g-0">
        <div class="col-sm-6 d-none d-md-block">
            <img src="{{asset('Image/general/templateImage.jpg')}}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="col-lg-6">
            <div class="card-body p-md-5 ">
                <!-- HEADER -->
                <div class="d-flex header">
                    <img class="logo-img" src="{{asset('Image/general/logo.png')}}" alt="logo">
                    <h5 class="mb-1">GivingGoods</h5>
                </div>

                {{-- OPTIONS --}}
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title">Atur ulang kata sandi</h5>
                        <div class="desc-text">Buat kata sandi baru yang kuat untuk akunmu.</div>
                        <form action="{{route('checking_password')}}" class="text" method="POST">
                            @csrf
                            <label for="password" id="password" class="password-text fw-normal lh-1 ">
                                Kata Sandi Baru
                            </label>
                            <input type="password" name="password" class="password-input @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                            <label for="password_confirmation" id="password" class="password-text fw-normal lh-1">
                                Ketik Ulang Kata Sandi Baru
                            </label>
                            <input type="password" name="password_confirmation" class="password-input  @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <div class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </div>
                            @enderror
                            <button type="submit" class="btn px-4 me-md-2 fw-normal" id="btn-save">
                                Simpan
                            </button>
                        </form>
                        <a data-bs-toggle="modal" data-bs-target="#exitResetPasswordModal" class="btn btn-block btn-back" id="exitResetPassword">Kembali</a>
                    </div>
                </div>

                <!-- Sudah punya akun? -->
                <div class="d-flex bottom-txt">
                    <div id="copyright-txt">©️GivingGoods | 2024</div>
                </div>
            </div>
        </div>

        {{-- MODAL  --}}
        <div class="container">
            <div class="modal fade" id="exitResetPasswordModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header text-center border-0">
                        <h5 class="modal-title w-100" id="logoutModalLabel">Keluar dari Halaman ini?</h5>
                    </div>
                    <div class="modal-body">
                        Kalau keluar sekarang, kata sandi yang Anda ubah tidak akan tersimpan.
                    </div>
                    <div class="row modal-footer align-content-center justify-content-center border-0">
                        <div class="col-change">
                            <button type="button" class="btn" id="btn-change" data-bs-dismiss="modal">Lanjut Ubah</button>
                        </div>
                        <div class="col-login">
                            <button  onclick="window.location.href='{{route('login')}}'" type="button" class="btn" id="btn-login">Keluar</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
