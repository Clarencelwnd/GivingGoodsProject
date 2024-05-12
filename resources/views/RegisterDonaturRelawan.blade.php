<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Donatur/Relawan</title>
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
        .form-container label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="tel"],
        .form-container input[type="password"] {
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
            margin-top: -5px;
            margin-bottom: 10px;
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

        .num-container {
        position: relative;
        margin-bottom: 10px;
        width: calc(100% - 20px);
        }

        .num-btn {
            position: absolute;
            left: 0;
            top: 0;
            width: 15%;
            height: calc(100% - 30px);
            padding: 10px;
            background-color: #DFDFDF;
            border-radius: 4px 0 0 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .num-container input[type="text"] {
            width: calc(85% - 10px);
            margin-left: calc(15% + 10px);
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
                <label for="organization">Nama Organisasi</label>
                <input type="text" id="organization" placeholder="">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="">
                <label for="phone">Nomor HP</label>
                <div class="num-container">
                    <div class="num-btn">+62</div>
                    <input type="text" id="phone" placeholder="">
                </div>
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" placeholder="">
                <p class="password-hint">Harus terdiri dari minimal 8 karakter</p>
                <div class="btn-container">
                    <form id="registerForm" action="/check-email" method="POST">
                        @csrf
                        <button type="submit" class="btn-primary">Buat Akun</button>
                    </form>
                    <button class="btn-secondary">Kembali</button>
                </div>
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



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buatAkunButton = document.querySelector(".btn-primary");
        const popupContainer = document.getElementById("popup-container");
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        const phoneInput = document.getElementById("phone");

        buatAkunButton.addEventListener("click", function(event) {
            event.preventDefault(); // Menghentikan default submit form

            // Validasi input tidak boleh kosong
            const email = emailInput.value.trim(); // Trim untuk menghapus spasi kosong di awal dan akhir

            if (email === '' || passwordInput.value === '' || phoneInput.value === '') {
                alert("Data tidak boleh ada yang kosong");
                return;
            }

            // Validasi email
            if (!validateEmail(email)) {
                alert("Format email tidak valid");
                return;
            }

            // Validasi password
            if (passwordInput.value.length < 8) {
                alert("Password harus memiliki minimal 8 karakter");
                return;
            }

            // Validasi nomor telepon
            if (!validatePhoneNumber(phoneInput.value)) {
                alert("Format nomor telepon tidak valid");
                return;
            }

            // Kirim data ke controller untuk dicek
            const formData = new FormData();
            formData.append('email', email);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat memproses permintaan.');
                }
                return response.json();
            })
            .then(data => {
                if (data.exists) {
                    const popupContent = `
                        <div id="popup">
                            <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Email sudah terdaftar</h3>
                            <p style="margin-top: 10px;">Lanjutkan dengan email ini? <br>${email}</p>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;">Ubah</button>
                                <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;">Ya, Masuk</button>
                            </div>
                        </div>
                    `;
                    popupContainer.innerHTML = popupContent;
                } else {
                    // Email belum terdaftar, simpan data ke database
                    fetch('/store', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            email: email,
                            password: passwordInput.value,
                            // Tambahkan data lain yang diperlukan untuk disimpan
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Terjadi kesalahan saat memproses permintaan.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const popupContent = `
                            <div id="popup">
                                <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Berhasil Membuat Akun</h3>
                                <img src="{{ asset('image/general/back.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
                            </div>
                        `;
                        popupContainer.innerHTML = popupContent;
                        setTimeout(function() {
                            window.location.href = "/RegisterSelected";
                        }, 4000);
                    })
                    .catch(error => {
                        console.error('Error:', error.message);
                        alert(error.message);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert(error.message);
            });
        });

        // Fungsi untuk validasi format email
        function validateEmail(email) {
            const re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        // Fungsi untuk validasi format nomor telepon
        function validatePhoneNumber(phoneNumber) {
            // Validasi jika input hanya terdiri dari angka
            if (!/^\d+$/.test(phoneNumber)) {
                return false;
            }
            return true;
        }
    });
</script>


</body>
</html>
