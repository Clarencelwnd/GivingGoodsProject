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
</head>
<body>
    <div class="row g-0">
        <div class="col-sm-6 d-none d-md-block">
            <img src="{{asset('storage/Image/general/templateImage.jpg')}}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="col-lg-6">
            <div class="card-body p-md-5 ">
                <!-- HEADER -->
                <div class="d-flex header">
                    <img class="logo-img" src="{{asset('storage/Image/general/logo.png')}}" alt="logo">
                    <h5 class="mb-1">GivingGoods</h5>
                </div>

                {{-- OPTIONS --}}
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title">Atur ulang kata sandi</h5>
                        <div class="desc-text">Buat kata sandi baru yang kuat untuk akunmu</div>
                        <form action="" class="text">
                            <label for="password" id="password" class="password-text fw-normal lh-1">
                                Kata Sandi Baru
                            </label>
                            <input type="password" name="password" class="password-input">
                            <label for="password_confirmation" id="password" class="password-text fw-normal lh-1">
                                Ketik Ulang Kata Sandi Baru
                            </label>
                            <input type="password" name="password_confirmation" class="password-input">
                            <button type="button" class="btn px-4 me-md-2 fw-normal" id="btn-save">
                                Simpan
                            </button>
                        </form>
                        <a href="{{route('exit_reset_password')}}" class="btn btn-block" id="btn-back">Kembali</a>
                    </div>
                </div>

                <!-- Sudah punya akun? -->
                <div class="d-flex bottom-txt">
                    <div id="copyright-txt">©️GivingGoods | 2024</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
