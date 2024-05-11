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
        <style>
        *{
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .img-fluid{
            display: block;
            height: 100vh;
            width: 50vw;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }

        .logo-img{
            width: 74px;
            height: 76px;
        }

        .header{
            width: 100%;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #00744C;
            word-wrap: break-word;
        }

        .card{
            width: 70%;
            height: 100%;
            margin: 0 auto;
            padding-top: 5px;
            background: #FDFFFE;
            border: none;
        }

        .card-body{
            width: 95%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 8px;
            display: inline-flex;
        }

        .card-title{
            color: #003A44;
            font-size: 18px;
            font-weight: 600;
            word-wrap: break-word;
        }

        .email-text{
            color: #003A44;
            text-align:justify;
            font-size: 10px;
            margin-bottom: 15px;
        }

        .email-input{
            background-color: #F0F0F0;
            border: none;
            border-radius: 5px;
            width: 100%;
            height: 40px;
            margin-bottom: 32px;
        }

        .btn{
            width: 100%;
            border-radius:5px;
            font-size: 13px;
        }

        #btn-next{
            background: #00AF71;
            color: #FDFFFE;
        }

        #btn-next:hover{
            background: #009B65;
            color: #FDFFFE;
        }

        #btn-login{
            color: #007C92;
            border: 1px solid #007C92;
        }

        #btn-login:hover{
            background: #E6E7E6;
            color: #007C92;
        }

        .bottom-txt{
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 10px;
        }

        #copyright-txt{
            padding-top: 15px;
            color: #009B65;
            font-size: 10px;
            font-weight: 500;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="left row g-0">
        <div class="col-sm-6 d-none d-md-block">
            <img src="{{asset('storage/Image/general/templateImage.jpg')}}" alt="Sample photo" class="img-fluid">
        </div>

        <div class="right col-lg-6">
            <div class="card-body p-md-5 ">
                <!-- HEADER -->
                <div class="d-flex header">
                    <img class="logo-img" src="{{asset('storage/Image/general/logo.png')}}" alt="logo">
                    <h3 class="mb-3">GivingGoods</h3>
                </div>

                {{-- OPTIONS --}}
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title">Atur ulang kata sandi</h5>
                        <form action="{{route('checking_email')}}" class="text" method="POST">
                            @csrf
                            <label for="email" id="email" class="email-text fw-normal lh-1">
                                Masukkan email yang terdaftar. Kami akan mengirim kode verifikasi untuk atur ulang kata sandi.
                            </label>
                            <input type="text" name="email" class="email-input">
                            <button type="submit" class="btn px-4 me-md-2 fw-normal" id="btn-next">
                                Lanjut
                            </button>
                        </form>
                        <a href="#" class="btn btn-block" id="btn-login">Kembali ke Halaman Masuk</a>
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
