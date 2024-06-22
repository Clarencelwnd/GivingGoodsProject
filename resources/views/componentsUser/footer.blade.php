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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/componentsUser/footer.css') }}">
</head>
<body>
    @php
        $DonaturRelawan = \App\Models\DonaturAtauRelawan::find($id);
    @endphp
    <div id="footerContainer" class="text-white">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 my-5">
            <div class="generalFooterTitle">
                <img src="{{ asset('Image/general/logo.png') }}" alt="logoImage" width="76">
                <p id="title">GivingGoods</p>
                <p id="phoneNumber">+62 812345678</p>
                <p id="email">givinggoods@gmail.com</p>
            </div>

            <div class="col mb-3 quickLinkDiv">
                <h5>Quick Links</h5>
                <ul class="nav flex-column quickLinks">
                    <li class="nav-item mb-2 "><a href="{{ route('displayDaftarKegiatan', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="kegiatanLink">Kegiatan</a></li>
                    <li class="nav-item mb-2 "><a href="{{ route('displayDaftarArtikel', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="artikelLink">Artikel</a></li>
                    <li class="nav-item mb-2 "><a href="{{ route('displayDaftarForum', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="forumLink">Forum</a></li>
                    <li class="nav-item mb-2 "><a href="{{ route('FAQ', ['id' => $DonaturRelawan->IDDonaturRelawan]) }}" id="faqLink">FAQ</a></li>
                </ul>
            </div>

            <div class="col mb-3 socialLinkDiv">
            <h5>Socials</h5>
            <ul class="nav flex-row socialLinks">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-muted">
                       <img src="{{ asset('Image/footer/twitter.png') }}" alt="twitterLogo" width="20">
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-muted">
                        <img src="{{ asset('Image/footer/linkedin.png') }}" alt="linkedinLogo" width="20">
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-muted">
                        <img src="{{ asset('Image/footer/facebook.png') }}" alt="facebookLogo" width="20">
                    </a>
                </li>
            </ul>
            </div>

        </footer>
    </div>

</body>
</html>
