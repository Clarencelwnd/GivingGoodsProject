<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisterDonaturRelawan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
        }
        .left-side {
            width: 50%;
            height: 100%;
            background-image: url("{{ asset('image/login_reset_password/bg2.png') }}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        .right-side {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 20px;
        }
        .logo {
            margin-bottom: 20px;
            height: 120px;
        }
        .form-container {
            background-color: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 8px;
            width: 60%;
            text-align: center;
        }
        .form-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: left;
        }
        .btn-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            margin-top: 30px;
            background-color: #00AF71;
            color: #FFFFFF;
        }
        .btn-primary:hover {
            border: 1px solid #00AF71;
        }
        .btn-secondary {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            background-color: #F0F0F0;
            font-size: 18px;
            font-weight: 500;
        }
        .btn-secondary:hover {
            border: 1px solid #00AF71;
        }
        .already-have-account {
            margin-top: 20px;
            text-align: center;
            width: 60%;
        }
        .already-have-account a {
            color: #0095AF;
            text-decoration: none;
            font-weight: bold;
        }
        .footer-image {
            margin-top: auto;
            margin-bottom: 20px;
            max-width: 100%;
            height: 15px;
        }
        .btn-secondary.donatur-relawan.selected {
    border: 1px solid #00AF71;
}

.btn-secondary.panti-sosial.selected {
    border: 1px solid #00AF71;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side"></div>
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
                Sudah Punya Akun? <a href="#">Masuk</a>
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
