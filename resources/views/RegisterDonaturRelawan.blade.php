<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Donatur/Relawan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/RegisterDonaturRelawan.css') }}" rel="stylesheet">
    <script src="{{ asset('js/RegisterDonaturRelawan.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('Image/login_reset_password/bg2.png') }}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="right-side">
            <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

            <div class="form-container">
                <h2>Mulai Bergabung</h2>

                <form id="registerForm" action="{{ route('registerUser') }}" method="POST">
                    @csrf

                    @if (Session::has('success'))
                        <div class="alert-success"> {{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('fail'))
                        <div class="alert-danger"> {{ Session::get('fail') }}</div>
                    @endif

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="">
                        <span style="color:red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="">
                        <span style="color:red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor HP</label>
                        <div class="num-container">
                            <div class="num-btn">+62</div>
                            <input type="text" id="phone" name="phone" placeholder="">
                            <span style="color:red">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" placeholder="">
                        <span style="color:red">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        <p class="password-hint">Harus terdiri dari minimal 8 karakter</p>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn-primary">Buat Akun</button>
                        <button class="btn-secondary">Kembali</button>
                    </div>
                </form>
            </div>

            <div class="already-have-account">
                Sudah Punya Akun? <a href="#">Masuk</a>
            </div>

            <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
        </div>
    </div>


<!-- Pop-up berhasil-->
        {{-- <div id="popup-container">
            <div id="popup">
                <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Berhasil Membuat Akun</h3>
                <img src="{{ asset('image/general/􀁣.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
            </div>
        </div> --}}


        <!-- Pop-up sudah terdaftar -->
{{-- <div id="popup-container">
    <div id="popup">
        <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Email sudah terdaftar</h3>
        <p style="margin-top: 10px;">Lanjutkan dengan email ini? <br> joshdoe@gmail.com</p>
        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
            <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;">Ubah</button>
            <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;">Ya, Masuk</button>
        </div>
    </div>
</div> --}}



{{-- <script>
    const checkEmailRoute = '{{ route('register.checkEmail') }}';
    const storeRoute = '{{ route('registerUser') }}';
    const imagePath = '{{ asset('image/general/back.png') }}';
</script> --}}


</body>
</html>



