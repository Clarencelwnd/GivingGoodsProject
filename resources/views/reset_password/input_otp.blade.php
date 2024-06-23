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
    <link rel="stylesheet" href="{{asset('css/ResetPassword/input_otp.css')}}">
</head>
<body>
    <div class="content row g-0 vh-100">
        <div class="col-sm-6 d-none d-md-block">
            <img src="{{asset('Image/general/templateImage.jpg')}}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card-body p-md-5 d-flex flex-column align-items-center">
                <!-- HEADER -->
                <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

                {{-- OPTIONS --}}
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title">Atur ulang kata sandi</h5>
                        <form action="{{route('checking_otp')}}" class="text" method="POST">
                            @csrf
                            <input type="hidden" id="kirim" value="{{route('input_otp')}}">
                            <label for="otp" id="otp" class="otp-text">
                                Masukkan kode OTP yang telah dikirim ke email Anda
                            </label>
                            <input type="text" name="otp" class="otp-input @error('otp') is-invalid @enderror">
                            @error('otp')
                                <label class="error-msg invalid-feedback fw-normal lh-1">
                                    {{$message}}
                                </label>
                            @enderror
                            <div class="otp-text fw-normal lh-1" id="kirim-ulang">Mohon tunggu dalam <span id="sec">30</span> detik untuk kirim ulang OTP</div>
                            <button type="submit" class="btn px-4 me-md-2 fw-normal" id="btn-next">
                                Verifikasi
                            </button>
                        </form>
                        <a href="{{route('reset_password')}}" class="btn btn-block" id="btn-back">Kembali</a>
                    </div>
                </div>

                <!-- Sudah punya akun? -->
                <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/input_otp.js') }}"></script>
</body>
</html>
