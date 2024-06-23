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
    <link rel="stylesheet" href="{{asset('css/ResetPassword/email_reset_password.css')}}">
</head>
<body>
    <div class="content row g-0 vh-100">
        <div class="col-sm-6 d-none d-md-block">
            <img src="{{asset('Image/general/templateImage.jpg')}}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card-body p-md-5 d-flex flex-column align-items-center">
                {{-- HEADER --}}
               <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

                {{-- OPTIONS --}}
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title">Atur ulang kata sandi</h5>
                        <form action="{{route('checking_email')}}" class="text" method="POST">
                            @csrf
                            <label for="email" id="email" class="email-text fw-normal lh-1">
                                Masukkan email yang terdaftar. Kami akan mengirim kode verifikasi untuk atur ulang kata sandi.
                            </label>
                            <input type="text" name="email" value="{{session('email')}}" class="email-input @error('email') is-invalid @enderror">
                            @error('email')
                                <label class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </label>
                            @enderror
                            <button type="submit" class="btn btn-block px-4 me-md-2 fw-normal" id="btn-next">
                                Lanjut
                            </button>
                        </form>
                        <a href="{{ route('login-user') }}" class="btn btn-block" id="btn-login">Kembali ke Halaman Masuk</a>
                    </div>
                </div>

                {{-- Sudah punya akun? --}}
                <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
            </div>
        </div>

        {{-- MODAL --}}
        <div class="container">
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header text-center border-0">
                        <h5 class="modal-title w-100" id="logoutModalLabel">Email belum terdaftar</h5>
                    </div>
                    <div class="modal-body">
                        Lanjutkan dengan email ini {{session('email')}}?
                    </div>
                    <div class="row modal-footer align-content-center justify-content-center border-0">
                        <div class="col-change">
                            <button type="button" class="btn" id="btn-change" data-bs-dismiss="modal">Ubah</button>
                        </div>
                        <div class="col-register">
                            <button  onclick="window.location.href='{{route('registerSelected')}}'" type="button" class="btn" id="btn-register">Ya, Daftar</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @if (session()->has('showModal'))
        <script>
        window.onload = function() {
                var myModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                myModal.show();
            };
        </script>
        <?php session()->forget('showModal'); ?>
    @endif
</body>
</html>
