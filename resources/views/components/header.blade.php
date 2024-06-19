<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
</head>
<body>
    @php
        $DonaturRelawan = \App\Models\DonaturAtauRelawan::find($id);
    @endphp

    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start mt-2 mx-3">
        <a href="{{ route('displayUserGeneralPage', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" class="d-block me-4">
            <img id="logoImg" src="{{asset('Image/general/logo.png')}}" alt="logo" width="70">
          </a>

        <ul class="d-flex nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
            <li>
                <a href="{{ route('displayDaftarKegiatan', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="kegiatanBtn" class="nav-link px-2" style="color: #00925F;">
                    Kegiatan
                </a>
            </li>
            <li><a href="{{ route('displayDaftarArtikel', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="artikelButton" class="nav-link px-2" style="color: #00925F;">Artikel</a></li>
            <li><a href="{{ route('displayDaftarForum', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="forumButton" class="nav-link px-2" style="color: #00925F;">Forum</a></li>
            <li><a href="{{ route('FAQ', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="faqButton" class="nav-link px-2" style="color: #00925F;">FAQ</a></li>
        </ul>


        {{-- <div class="dropdown text-end">
            <a href="#" class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #00925F;">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2">
                John
            </a>
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="#" style="color: #007C92;">Pengaturan</a></li>
                <li><a class="dropdown-item" href="#" style="color: #007C92;">Keluar Akun</a></li>
            </ul>
        </div> --}}
        {{-- <div id="profileDropdown" class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" style="color: #00AF71;" id="dropdownUserName" data-bs-toggle="dropdown" aria-expanded="false" style="color: #00925F;">
                <img src="https://github.com/mdo.png" id="organization-profile" alt="mdo" class="rounded-circle">
                John
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1" data-popper-placement="bottom-start">
              <li><a class="dropdown-item" href="{{route('profile.donatur_relawan',['id' => $id])}}" style="color: #007C92;">Pengaturan</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a id="keluarAkun" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" style="color: #A22E27;">Keluar Akun</a></li>
              </li>
            </ul>
        </div> --}}

        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUserName" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" id="organization-profile" alt="mdo" class="rounded-circle">
                {{-- OCG Saving The Ocean --}}
                {{$DonaturRelawan->NamaDonaturRelawan}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1" data-popper-placement="bottom-start">
              <li><a class="dropdown-item" href="{{route('profile.donatur_relawan',['id' => $id])}}">Pengaturan</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a id="keluarAkun" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar Akun</a></li>
              </li>
            </ul>
        </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



