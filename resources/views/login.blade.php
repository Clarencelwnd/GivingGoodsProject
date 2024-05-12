<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="left row g-0">
        <div class="col-sm-6 d-none d-md-block">
            <img src="{{ asset('Image/login_reset_password/bg1.png') }}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="right col-lg-6">
            <div class="card-body p-md-5 ">
                <!-- HEADER -->
                <div class="d-flex header">
                    <img class="logo-img" src="{{ asset('Image/general/logo.png') }}" alt="logo">
                    <h3 class="mb-3">GivingGoods</h3>
                </div>

               <!-- OPTIONS  -->
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title">Akses Akun Anda</h5>

                        <form action="{{ url('login') }}" method="POST">
                            <!-- EMAIL -->
                            <!-- <div class= "mb-2">  -->
                            <div data-mdb-input-init class="email">
                                <label class="form-label" for="email-input">Email</label>
                                <input type="text" id="email-input" class="form-control form-control-md border-1 shadow-none" >
                            </div>
                            <!-- </div> -->

                            <div class="password">
                                <!-- PASSWORD -->
                                <!-- <div class="col-md-10 mb-0"> -->
                                    <div data-mdb-input-init>
                                        <label class="form-label" for="password-input">Kata Sandi</label>
                                        <input type="text" id="password-input" class="form-control form-control-md border-1 shadow-none " >
                                    </div>
                                <!-- </div> -->

                                <!-- FORGOT PASSWORD -->
                                    <a href="#" id="forgot-password-btn">Lupa kata sandi?</a>
                            </div>
                        </form>

                        <a href="#" class="btn-next btn btn-block">Masuk Akun</a>

                    </div>
                </div>

                <!-- Sudah punya akun? -->
                <div class="d-flex bottom-txt">
                    <div id="no-account-txt">Belum Punya Akun? <a href="#" id="register-btn" target="_self">Daftar</a> </div>
                    <div id="copyright-txt">©️GivingGoods | 2024</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>
