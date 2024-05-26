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
    <link rel="stylesheet" href="{{ asset('css/RegisterPantiSosial.css') }}">
    <script src="{{ asset('js/RegisterPantiSosial.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('Image/login_reset_password/bg3.png') }}" alt="Sample photo" class="img-fluid">
        </div>
        <div class="right-side">
            <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

            {{-- FORM --}}
            <div class="form-container">
                <form action="{{ route('registerPantiSosial1') }}" method="POST">
                    @csrf
                    <h2>Mulai Bergabung</h2>

                    <div class="form-group">
                        <label for="organization-name">Nama Organisasi</label>
                        <input type="text" name="organization-name" id="organization" value="{{ old('organization-name') }}">
                        <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                            @error('organization-name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                        <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <div class="num-container" style="padding-left: 5px;">
                            <div class="num-btn">+62</div>
                            <input type="text" name="phone" value="{{ old('phone') }}">
                        </div>
                        <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" name="password" id="password">
                        <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        <p class="password-hint">Harus terdiri dari minimal 8 karakter</p>
                    </div>

                    <div class="btn-container" class="form-group">
                        <button type="submit" class="btn-primary">Selanjutnya</button>
                        <a class="btn-secondary" href="{{ route('registerSelected') }}" style="text-decoration: none;">Kembali</a>
                    </div>

                </form>
            </div>

            {{-- SUDAH PUNYA AKUN --}}
            <div class="already-have-account">
                Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a>
            </div>
            <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
        </div>
    </div>

</body>
</html>