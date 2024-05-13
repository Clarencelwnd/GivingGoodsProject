<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Panti Sosial</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/RegisterPantiSosial.css') }}">
    {{-- <script src="{{ asset('js/RegisterPantiSosial.js') }}"></script> --}}
</head>
<body>

    <div class="container">
        <div class="left-side"></div>
        <div class="right-side">
            <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">
            <div class="form-container">
                <h2>Mulai Bergabung</h2>
                <label for="organization">Nama Organisasi</label>
                <input type="text" id="organization" placeholder="">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="">
                <label for="phone">Nomor HP</label>
                <div class="num-container">
                    <div class="num-btn">+62</div>
                    <input type="text" placeholder="">
                </div>
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" placeholder="">
                <p class="password-hint">Harus terdiri dari minimal 8 karakter</p>
                <div class="btn-container">
                    <button class="btn-primary" onclick="window.location.href='/RegisterPantiSosial-2'">Selanjutnya</button>
                    <button class="btn-secondary">Kembali</button>
                </div>
            </div>
            <div class="already-have-account">
                Sudah Punya Akun? <a href="#">Masuk</a>
            </div>
            <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
        </div>
    </div>

</body>
</html>
