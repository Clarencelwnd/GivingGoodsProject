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
    <link rel="stylesheet" href="{{asset('css/detail_riwayat_kegiatan.css')}}">
</head>
<body>
    <div class="card container justify-content-center">
        @if ($detailRegistrasiDonatur)
            <div class="card-header">
                <p class="position">Profil > Riwayat Kegiatan > {{$detailRegistrasiDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</p>
                <div class="row card-title">
                    <div class="col">
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id1])}}">&lt; {{$detailRegistrasiDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</a>
                    </div>
                    <div class="col-auto label-status-kegiatan d-flex justify-content-end align-items-center">
                        @if ($detailRegistrasiDonatur->StatusRegistrasiDonatur === 'sedang_diproses')
                            Sedang Diproses
                        @elseif($detailRegistrasiDonatur->StatusRegistrasiDonatur === 'donasi_diterima')
                            Donasi Diterima
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="caption">Nama Panti Sosial</div>
                <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->NamaPantiSosial}}</div>
                <br>
                <div class="caption">Kontak Panti Sosial</div>
                <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->NomorTeleponPantiSosial}}</div>
                <br>
                <div class="caption">Alamat Panti Sosial</div>
                <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->AlamatPantiSosial}}</div>
                <br>
                <div class="caption">Jam & Tanggal Donasi</div>
                <div class="row">
                    <div class="col-auto">
                        <img class="gambar" src="{{asset('Image/general/calendar.png')}}" alt="">
                    </div>
                    <div class="col-auto content">
                        {{$detailRegistrasiDonatur->FormatTanggalDonasi}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <img class="gambar" src="{{asset('Image/general/time.png')}}" alt="">
                    </div>
                    <div class="col-auto content">
                        {{$detailRegistrasiDonatur->JamDonasi}}
                    </div>
                </div>
                <br>
                <div class="caption">Jenis Donasi</div>
                <div class="row">
                    @foreach ($detailRegistrasiDonatur->donasiDanGambar as $donasi)
                        <div class="col-auto">
                            <img class="gambar" src="{{asset($donasi['image'])}}" alt="">
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="caption">Deskripsi Donasi</div>
                <div class="content">tes</div>
            </div>
        @endif
        @if ($detailRegistrasiRelawan)
            <div class="card-header">
                <p class="position">Profil > Riwayat Kegiatan > {{$detailRegistrasiDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</p>
                <div class="row card-title">
                    <div class="col">
                        <a class="title" href="{{route('riwayat_kegiatan', ['id'=>$id1])}}">&lt; {{$detailRegistrasiDonatur->kegiatanDonasi->NamaKegiatanDonasi}}</a>
                    </div>
                    <div class="col-auto label-status-kegiatan d-flex justify-content-end align-items-center">
                        @if ($detailRegistrasiDonatur->StatusRegistrasiDonatur === 'sedang_diproses')
                            Sedang Diproses
                        @elseif($detailRegistrasiDonatur->StatusRegistrasiDonatur === 'donasi_diterima')
                            Donasi Diterima
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="caption">Nama Panti Sosial</div>
                <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->NamaPantiSosial}}</div>
                <br>
                <div class="caption">Kontak Panti Sosial</div>
                <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->NomorTeleponPantiSosial}}</div>
                <br>
                <div class="caption">Alamat Panti Sosial</div>
                <div class="content">{{$detailRegistrasiDonatur->kegiatanDonasi->pantiSosial->AlamatPantiSosial}}</div>
                <br>
                <div class="caption">Jam & Tanggal Donasi</div>
                <div class="row">
                    <div class="col-auto">
                        <img class="gambar" src="{{asset('Image/general/calendar.png')}}" alt="">
                    </div>
                    <div class="col-auto content">
                        {{$detailRegistrasiDonatur->FormatTanggalDonasi}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <img class="gambar" src="{{asset('Image/general/time.png')}}" alt="">
                    </div>
                    <div class="col-auto content">
                        {{$detailRegistrasiDonatur->JamDonasi}}
                    </div>
                </div>
                <br>
                <div class="caption">Jenis Donasi</div>
                <div class="row">
                    @foreach ($detailRegistrasiDonatur->donasiDanGambar as $donasi)
                        <div class="col-auto">
                            <img class="gambar" src="{{asset($donasi['image'])}}" alt="">
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="caption">Deskripsi Donasi</div>
                <div class="content">tes</div>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
