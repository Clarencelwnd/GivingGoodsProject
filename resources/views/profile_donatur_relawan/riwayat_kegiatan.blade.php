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
    <link rel="stylesheet" href="{{asset('css/riwayat_kegiatan.css')}}">
</head>
<body>
    <div class="card main container justify-content-center">
        <div class="card-header main">
            <p class="position">Profil > Riwayat Kegiatan</p>
            <a class="back" href="{{route('profile.donatur_relawan', ['id'=>$id])}}">&lt; Kembali ke Profil</a>
            <h5 class="title">Riwayat Kegiatan</h5>
        </div>
        <div class="card-body main">
            <div class="row d-flex justify-content-start">
                <button type="button" class="col-auto btn btn-filter selected" data-filter="semua" id="btn-semua">Semua</button>
                <button type="button" class="col-auto btn btn-filter" data-filter="donasi" id="btn-donasi">Donasi</button>
                <button type="button" class="col-auto btn btn-filter" data-filter="relawan" id="btn-relawan">Relawan</button>
            </div>
            <div class="row d-flex justify-content-start" id="sub-filter"></div>
            @if ($registrasiDonatur->isEmpty() && $registrasiRelawan->isEmpty())
                <div class="card blank container d-flex justify-content-center align-items-center">
                    <div class="card-text blank">Belum ada riwayat registrasi kegiatan donatur maupun relawan</div>
                </div>
            @endif
            @if ($registrasiDonatur)
                @foreach($registrasiDonatur as $key => $registDonatur)
                    <div class="data-item semua donasi card kegiatan container justify-content-center" data-status-kegiatan="{{$registDonatur->StatusRegistrasiDonatur}}" data-url="{{route('detail_riwayat_kegiatan', ['id1' => $id, 'id2' => $registDonatur->IDRegistrasiDonatur])}}">
                        <div class="card-header kegiatan">
                            <div class="row mt-1 mb-2">
                                <div class="col-auto label-donasi-relawan">Donasi</div>
                                <div class="col-auto tanggal-donasi-relawan">{{$registDonatur->FormatTanggalDonasi}}</div>
                            </div>
                            <h6 class="card-title">{{$registDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</h6>
                        </div>
                        <div class="card-body kegiatan">
                            <div class="nama-panti">{{$registDonatur->kegiatanDonasi->pantiSosial->NamaPantiSosial}}</div>
                            <div class="jenis-donasi-relawan">Jenis Donasi:
                                @foreach ($registDonatur->donasiDanGambar as $donasi)
                                    <img class="gambar-donasi" src="{{asset($donasi['image'])}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($registrasiRelawan)
                @foreach($registrasiRelawan as $registRelawan)
                    <div class="data-item semua relawan card kegiatan container justify-content-center" data-status-kegiatan="{{$registRelawan->StatusRegistrasiRelawan}}" data-url="{{route('detail_riwayat_kegiatan', ['id1'=>$id, 'id2'=> $registRelawan->IDRegistrasiRelawan])}}">
                        <div class="card-header kegiatan">
                            <div class="row mt-1 mb-2">
                                <div class="col-auto label-donasi-relawan">Relawan</div>
                                <div class="col-auto tanggal-donasi-relawan">{{$registRelawan->FormatTanggalRelawan}}</div>
                            </div>
                            <h6 class="card-title">{{$registRelawan->kegiatanRelawan->NamaKegiatanRelawan}}</h6>
                        </div>
                        <div class="card-body kegiatan">
                            <div class="nama-panti">{{$registRelawan->kegiatanRelawan->pantiSosial->NamaPantiSosial}}</div>
                            <div class="jenis-donasi-relawan">Jenis Relawan: {{$registRelawan->kegiatanRelawan->JenisKegiatanRelawan}}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/riwayat_kegiatan.js')}}"></script>
</body>
</html>
