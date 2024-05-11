<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Panti Sosial 2</title>
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
            background-image: url("{{ asset('image/login_reset_password/bg3.png') }}");
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
        .form-container label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"]{
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #F0F0F0;
        }
        .password-hint {
            color: #989898;
            font-size: 12px;
            text-align: left;
        }
        .btn-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #00AF71;
            color: #FFFFFF;
        }
        .btn-secondary {
            background-color: #FFFFFF;
            color: #007C92;
            border: 1px solid #007C92;
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

        .upload-container {
        position: relative;
        margin-bottom: 10px;
        width: calc(100% - 20px);
    }

    .upload-btn {
        position: absolute;
        left: 0;
        top: 0;
        width: 25%;
        height: calc(100% - 30px);
        padding: 10px;
        background-color: #DFDFDF;
        border-radius: 4px 0 0 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .upload-btn:hover {
        background-color: #CCCCCC;
    }

    .upload-btn:focus {
        border: 1px solid #007C92;
    }

    .upload-container input[type="file"] {
        display: none;
    }

    .upload-container input[type="text"] {
        width: calc(75% - 10px);
        margin-left: calc(25% + 10px);
        padding: 10px;
        border: none;
        border-radius: 0 4px 4px 0;
        background-color: #F0F0F0;
    }
    #popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 4px;
            width: 25%;
            text-align: center;
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
                <label for="organization">Nomor Registrasi</label>
                <input type="text" id="organization" placeholder="">
                <label for="document">Unggah Dokumen Validitas</label>
                <div class="upload-container">
                    <input type="file" id="document" style="display: none;">
                    <div class="upload-btn" onclick="document.getElementById('document').click()">Upload</div>
                    <input type="text" placeholder="" readonly>
                </div>
                <div class="btn-container">
                    <button class="btn-primary">Buat Akun</button>
                    <button class="btn-secondary">Kembali</button>
                </div>
            </div>
            <div class="already-have-account">
                Sudah Punya Akun? <a href="#">Masuk</a>
            </div>
            <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
        </div>
    </div>

    <div id="popup-container">
        <div id="popup">
            <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Berhasil Membuat Akun</h3>
            <img src="{{ asset('image/general/􀁣.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buatAkunButton = document.querySelector(".btn-primary");
            const popupContainer = document.getElementById("popup-container");
            buatAkunButton.addEventListener("click", function() {
                popupContainer.style.display = "block";
            });
        });
    </script>
</body>
</html>
