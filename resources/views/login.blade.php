<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('Image/login_reset_password/bg1.png') }}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="right-side">
            <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

            <div class="form-container">
                <h2>Akses Akun Anda</h2>

                @if (Session::has('fail'))
                    <div class="alert-danger"> {{ Session::get('fail') }}</div>
                @endif

                <form action="{{ route('login-user') }}" method="POST">
                    @csrf


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}">
                    </div>


                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <a href="#" id="forgot-password-btn">Lupa kata sandi?</a>
                    <button type="submit" class="btn-primary">Masuk Akun</button>
                </form>
            </div>

            <div class="already-have-account">
                Belum Punya Akun? <a href="{{ route('registerSelected') }}" id="register-btn" target="_self">Daftar</a>
            </div>

            <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
        </div>
    </div>

</body>
</html>



