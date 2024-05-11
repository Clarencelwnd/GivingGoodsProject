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
        .overlay{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Warna hitam dengan opasitas 50% */
            z-index: 999; /* Menempatkan overlay di atas konten lain */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .btn{
            border-radius:5px;
            font-size: 13px;
        }

        #btn-register{
            background: #00AF71;
            color: #FDFFFE;
        }

        #btn-register:hover{
            background: #009B65;
            color: #FDFFFE;
        }

        #btn-change{
            color: #007C92;
            border: 1px solid #007C92;
        }

        #btn-change:hover{
            background: #E6E7E6;
            color: #007C92;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="popup-content">
            <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalChoice">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-2">Email belum terdaftar</h5>
                            <p class="mb-0">Lanjutkan dengan email ini {{$email}}?</p>
                        </div>
                        <div class="modal-footer pb-3 border-top-0 d-flex justify-content-between">
                            <button type="button" class="btn btn-lg fs-6 text-decoration-none col-5 py-2 m-0" id="btn-change">Ubah</button>
                            <button type="button" class="btn btn-lg fs-6 text-decoration-none col-5 py-2 m-0" id="btn-register">Ya, Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
