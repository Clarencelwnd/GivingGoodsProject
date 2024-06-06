<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/components/cardKegiatan.css') }}">
</head>
<body>
    <div class="card" style="width: 16rem;">
        <img src="{{ asset('Image/login_reset_password/bg1.png') }}" class="card-img-top" style="height: 14rem" alt="...">
        <div class="card-body card-kegiatan">
          <h5 class="card-title" id="card-namaKegiatan">Nama Kegiatan</h5>
          <p class="card-text" id="card-jenisDonasi">Jenis Donasi</p>
          <div class="d-flex justify-content-between">
              <p class="card-text" id="card-namaPanti">Nama Panti</p>
              <p class="card-text" id="card-jenisDonasi">Jarak</p>
          </div>
        </div>
    </div>
</body>
</html>
