    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RegisterDonaturRelawan</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="{{ asset('css/Registration/RegisterSelected.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="content row g-0 vh-100">
            <div class="col-sm-6 d-none d-lg-block">
                <img src="{{ asset('Image/login_reset_password/bg2.png') }}" alt="Sample photo" class="img-fluid">
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="card-body p-md-5 d-flex flex-column align-items-center">
                    {{-- HEADER --}}
                    <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

                    {{-- OPTIONS --}}
                            <div class="form-container">
                                <h2 id="judul-form">Mulai Bergabung</h2>
                                <div class="btn-container">
                                    <button class="btn-secondary donatur-relawan" style="height: 60px;">Daftar sebagai Donatur/Relawan</button>
                                    <button class="btn-secondary panti-sosial" style="height: 60px;">Daftar sebagai Panti Sosial</button>
                                    <button id="selanjutnya" class="btn-primary">Selanjutnya</button>
                                </div>
                            </div>
                    <div class="already-have-account">
                        Sudah Punya Akun? <a href="{{ route('login') }}">Masuk</a>
                    </div>
                    <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const btnSelanjutnya = document.getElementById("selanjutnya");
                const donaturRelawanButton = document.querySelector(".donatur-relawan");
                const pantiSosialButton = document.querySelector(".panti-sosial");

                btnSelanjutnya.addEventListener("click", function() {
                    if (donaturRelawanButton.classList.contains("selected")) {
                        window.location.href = "/RegisterDonaturRelawan";
                    } else if (pantiSosialButton.classList.contains("selected")) {
                        window.location.href = "/RegisterPantiSosial";
                    }
                });

                donaturRelawanButton.addEventListener("click", function() {
                    donaturRelawanButton.classList.add("selected");
                    pantiSosialButton.classList.remove("selected");
                });

                pantiSosialButton.addEventListener("click", function() {
                    pantiSosialButton.classList.add("selected");
                    donaturRelawanButton.classList.remove("selected");
                });
            });
        </script>
    </body>
    </html>
