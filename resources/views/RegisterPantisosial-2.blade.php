<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Panti Sosial 2</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/RegisterPantiSosial-2.css') }}" rel="stylesheet">
    <script src="{{ asset('js/RegisterPantiSosial-2.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('Image/login_reset_password/bg3.png') }}" alt="Sample photo" class="img-fluid">
        </div>

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

</body>
</html>
