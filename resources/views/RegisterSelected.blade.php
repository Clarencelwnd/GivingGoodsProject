<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisterDonaturRelawan</title>
    <link href="{{ asset('css/RegisterSelected.css') }}" rel="stylesheet">
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
