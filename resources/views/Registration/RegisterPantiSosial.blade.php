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
    <link rel="stylesheet" href="{{ asset('css/Registration/RegisterPantiSosial.css') }}">
    <script src="{{ asset('js/RegisterPantiSosial.js') }}"></script>
</head>
<body>
    <div class="content row g-0 vh-100">
        <div class="col-sm-6 d-none d-lg-block" style="overflow-y: hidden;">
            <img src="{{ asset('Image/login_reset_password/bg3.png') }}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="col-lg-6 d-flex justify-content-center" style="overflow-y: auto; height: 100%;">
            <div class="card-body d-flex flex-column align-items-center">
                {{-- HEADER --}}
                <img src="{{ asset('Image/general/logo.png') }}" alt="Logo" class="logo">

                {{-- FORM --}}
                <div class="form-container">
                    <h2 id="judul-form">Mulai Bergabung</h2>

                    <form id="registerForm" action="{{ route('registerPantiSosial1') }}" method="POST">
                        @csrf

                        @if(Session::has('exists'))
                        <div id="popup-container-email-exists" style="display: block;">
                            <!-- Popup untuk email sudah terdaftar -->
                            <div id="popup">
                                <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Email sudah terdaftar</h3>
                                <p style="margin-top: 10px;">Lanjutkan dengan email ini? <br> {{ session('registeredEmail') }}</p>
                                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                    <button class="btn-secondary" style="margin-right: 10px;" onclick="window.location.href='{{ url('/RegisterPantiSosial') }}'; return false;">Ubah</button>
                                    <button class="btn-primary" style="margin-left: 10px;" onclick="window.location.href='{{ route('login-user') }}'; return false;">Ya, Masuk</button>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="organization-name">Nama Organisasi</label>
                            <input type="text" name="organization-name" id="organization" value="{{ session('organization_name') }}">
                            <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                                @error('organization-name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ session('email') }}">
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
                                <input type="text" name="phone" value="{{ session('phone') }}">
                            </div>
                            <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" name="password" id="password" value="{{session('password')}}">
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
                Sudah Punya Akun? <a href="{{ route('login-user') }}">Masuk</a>
            </div>
            <div class="footer">
                <img src="{{ asset('Image/footer/GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
            </div>
        </div>
    </div>
</div>

</body>
</html>
