<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/detail_riwayat_kegiatan_relawan.css')}}">
</head>
<body>
    <div class="card container justify-content-center">
        <div class="card-header">
            <p class="position">Profil > Riwayat Kegiatan > {{$detailRegistrasiRelawan->kegiatanRelawan->NamaKegiatanRelawan}}</p>
            <div class="row card-title">
                <div class="col row">
                    <div class="col-auto back-column">
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id1])}}">
                            <img class="gambar-back" src="{{asset('Image/general/back.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id1])}}">{{$detailRegistrasiRelawan->kegiatanRelawan->NamaKegiatanRelawan}}</a>
                    </div>
                </div>
                <div class="col-auto label-status-kegiatan d-flex justify-content-end align-items-center">
                    @if ($detailRegistrasiRelawan->StatusRegistrasiRelawan === 'Menunggu Konfirmasi')
                        Menunggu Konfirmasi
                    @elseif($detailRegistrasiRelawan->StatusRegistrasiRelawan === 'Relawan Diterima')
                        Relawan Diterima
                    @elseif($detailRegistrasiRelawan->StatusRegistrasiRelawan === 'Relawan Ditolak')
                        Relawan Ditolak
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="caption">Nama Panti Sosial</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->pantiSosial->NamaPantiSosial}}</div>
            <br>
            <div class="caption">Kontak Panti Sosial</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->pantiSosial->NomorTeleponPantiSosial}}</div>
            <br>
            <div class="caption">Lokasi Kegiatan Relawan</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->pantiSosial->AlamatPantiSosial}}</div>
            <br>
            <div class="caption">Alasan Menjadi Relawan</div>
            <div class="content">{{$detailRegistrasiRelawan->AlasanRegistrasiRelawan}}</div>
            <br>
            <div class="caption">Jam & Tanggal Mengikuti Kegiatan</div>
            <div class="row">
                <div class="col-auto">
                    <img class="gambar" src="{{asset('Image/general/calendar.png')}}" alt="">
                </div>
                <div class="col-auto content">
                    {{$detailRegistrasiRelawan->FormatTanggalRelawan}}
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <img class="gambar" src="{{asset('Image/general/time.png')}}" alt="">
                </div>
                <div class="col-auto content">
                    {{$detailRegistrasiRelawan->FormatJamRelawan}}
                </div>
            </div>
            <br>
            <div class="caption">Jenis Kegiatan Relawan</div>
            <div class="content">{{$detailRegistrasiRelawan->kegiatanRelawan->JenisKegiatanRelawan}}</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
