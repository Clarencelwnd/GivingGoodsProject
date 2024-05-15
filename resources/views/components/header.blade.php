<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center align-content-center mb-md-0">
                <button class="openbtn" onclick="toggleNav()">☰</button>
                <div class="website-title">
                    <img src="{{ asset('Image/general/logo.png') }}" alt="logo" id="logoImage">
                    <h6 id="givingGoodsTitle">GivingGoods</h6>
                </div>
            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 34px, 0px);" data-popper-placement="bottom-start">
                  <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a id="keluarAkun" class="dropdown-item" href="#">Keluar Akun</a></li>
                </ul>
            </div>

          </div>
        </div>
      </header>
</body>
</html>
