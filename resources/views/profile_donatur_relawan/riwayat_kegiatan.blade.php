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
            <div id="card kegiatan container justify-content-center">
                @foreach ($registrasiDonatur as $registDonatur)
                    <div class="card-header">
                        {{$registDonatur->TanggalDonasi}}
                        @foreach ($kegiatanDonasi as $kegDonasi)
                            @foreach ($kegDonasi as $kegiatan)
                            {{$kegiatan->NamaKegiatanDonasi}}
                            @endforeach
                        @endforeach
                    </div>
                    <div class="card-body">

                    </div>
                @endforeach
                {{-- <div class="card-header">
                    @foreach ($registrasiDonatur as $registDonatur)
                        {{$registDonatur->TanggalDonasi}}
                    @endforeach
                    @foreach ($kegiatanDonasi as $kegDonasi)
                        @foreach ($kegDonasi as $kegiatan)
                            {{$kegiatan->NamaKegiatanDonasi}}
                        @endforeach
                    </div>
                    <div class="card-body">
                        @foreach ($pantiSosialDonasi as $pansos)
                            {{$pansos->NamaPantiSosial}}
                        @endforeach
                        @foreach ($registrasiDonatur as $registDonatur)
                            {{$registDonatur->JenisDonasiDidonasikan}}
                        @endforeach
                    </div>
                @endforeach --}}
                <!-- Contoh data -->
                {{-- <div class="data-item semua">Item Semua 1</div>
                <div class="data-item semua">Item Semua 2</div>
                <div class="data-item semua donasi sedang_diproses">Donasi Sedang Diproses 1</div>
                <div class="data-item semua donasi donasi_diterima">Donasi Diterima 1</div>
                <div class="data-item semua relawan menunggu_konfirmasi">Relawan Menunggu Konfirmasi 1</div>
                <div class="data-item semua relawan relawan_diterima">Relawan Diterima 1</div>
                <div class="data-item semua relawan relawan_ditolak">Relawan Ditolak 1</div> --}}
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/riwayat_kegiatan.js')}}"></script>
</body>
</html>
