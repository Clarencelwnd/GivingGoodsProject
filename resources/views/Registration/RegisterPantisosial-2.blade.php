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
    <link href="{{ asset('css/Registration/RegisterPantiSosial-2.css') }}" rel="stylesheet">
    <script src="{{ asset('js/RegisterPantiSosial-2.js') }}"></script>
</head>
<body>
    <div class="content row g-0 vh-100">
        <div class="col-sm-6 d-none d-lg-block">
            <img src="{{ asset('Image/login_reset_password/bg3.png') }}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="col-lg-6 d-flex justify-content-center">
            <div class="card-body p-md-5 d-flex flex-column align-items-center">
                {{-- HEADER --}}
                <img src="{{ asset('image/general/logo.png') }}" alt="Logo" class="logo">

                {{-- FORM --}}
                <div class="form-container">
                    <h2>Mulai Bergabung</h2>

                    <form action="{{ route('registerPantiSosial2') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @if (Session::has('success'))
                        <div id="popup-container-success" style="display: block;">
                            <!-- Popup untuk berhasil membuat akun -->
                            <div id="popup">
                                <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Berhasil Membuat Akun</h3>
                                <img src="{{ asset('image/general/􀁣.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
                            </div>
                        </div>

                        <script>
                            setTimeout(function() {
                                document.getElementById('popup-container-success').style.display = 'none';
                                window.location.href = "{{ route('login-user') }}";
                            }, 1500);
                        </script>
                 @endif

                    @if (Session::has('fail'))
                        <div class="alert-danger"> {{ Session::get('fail') }}</div>
                    @endif

                     <div class="form-group">
                        <label for="registration-num">Nomor Registrasi</label>
                        <input type="text" id="registration_num" name="registration_num" value="{{ old('registration_num') }}">
                        <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                            @error('registration_num')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="document">Unggah Dokumen Validitas</label>
                        <div class="upload-container" style="padding-left: 5px;">
                            <input type="file" id="document" name="validation_document" style="display: none;" onchange="updateFileName(this)">
                            <div class="upload-btn" onclick="document.getElementById('document').click()">Upload</div>
                            <input type="text" id="validation_document_text" readonly>
                        </div>
                        <span style="color:red; font-size: 12px; margin: 0; text-align: left; display: block; margin-top: -5px; margin-bottom: 5px;">
                            @error('validation_document')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <script>
                        function updateFileName(input) {
                            const fileName = input.files[0].name;
                            document.getElementById('validation_document_text').value = fileName;
                        }
                    </script>

                    <div class="btn-container">
                        <button type="submit" class="btn-primary">Buat Akun</button>
                        <button type="button" class="btn-secondary" onclick="window.location.href='{{ url()->previous() }}'">Kembali</button>
                    </div>
                </form>
                </div>

                <div class="already-have-account">
                    Sudah Punya Akun? <a href="{{ route('login-user') }}">Masuk</a>
                </div>

                <img src="{{ asset('image/footer/©️GivingGoods _ 2024.png') }}" alt="Footer" class="footer-image">
        </div>
    </div>
</div>

</body>
</html>


