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
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/sidebar.css') }}">
    <script src="{{ asset('js/templatePage.js') }}"></script>
</head>
<body>
    @php
        $PantiSosial = \App\Models\PantiSosial::find($id);
    @endphp
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center align-content-center mb-md-0">
                    <button class="openbtn" onclick="toggleNav()">☰</button>
                    <a href="{{ route('viewAllKegiatan', ['id' => $PantiSosial->IDPantiSosial]) }}" class="linkTitle">
                        <div class="row website-title d-flex align-items-center">
                            <div class="col">
                                <img src="{{ asset('Image/general/logo.png') }}" alt="logo" id="logoImage">
                            </div>
                            <div class="col">
                                <h6 id="givingGoodsTitle">GivingGoods</h6>
                            </div>
                        </div>
                    </a>
                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownOrganizationName" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset($PantiSosial->LogoPantiSosial)}}" id="organization-profile" alt="mdo" class="rounded-circle">
                        {{-- OCG Saving The Ocean --}}
                        {{$PantiSosial->NamaPantiSosial}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1" data-popper-placement="bottom-start">
                    <li><a class="dropdown-item" href="{{route('profile.panti_sosial',['id' => $id])}}">Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a id="keluarAkun" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar Akun</a></li>
                    </li>
                    </ul>
                </div>


                <!-- MODAL -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center">
                            <div class="modal-header text-center border-0">
                                <h5 class="modal-title w-100" id="logoutModalLabel" >Keluar dari Akun</h5>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin keluar dari akun Anda?
                            </div>
                            <div class="modal-footer align-content-center justify-content-center border-0">
                                <button type="button" class="btn btn-kembali" data-bs-dismiss="modal">Kembali</button>
                                <button type="button" class="btn btn-keluar" onclick="window.location.href='{{route('logout.panti_sosial')}}'">Ya, keluar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


</body>
</html>
