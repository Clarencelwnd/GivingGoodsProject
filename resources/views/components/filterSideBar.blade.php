<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="{{ asset('css/components/filter.css') }}">
</head>
<body>

<div>
    <div class="filter-header d-flex align-items-center">
        <img src="{{ asset('Image/general/filter.png') }}" alt="filter-icon">
        <h5 id="filterTitle">Filter</h5>
    </div>

    <div class="filter mt-3">
        <!-- JENIS KEGIATAN -->
        <button id="jenisKegiatanButton" class="btn w-100 text-start align-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#jenisKegiatanCollapse" aria-expanded="false" aria-controls="jenisKegiatanCollapse">
            Jenis Kegiatan
            <img class="dropdown-img float-end" src="{{ asset('Image/general/drop.png') }}" alt="" width="15px" height="15px" class="float-end">
        </button>
        <div class="collapse filter-section mt-2" id="jenisKegiatanCollapse">
            <div class="form-check">
                <input class="form-check-input jenis-kegiatan-checkbox" type="checkbox" name="jenis_kegiatan[]" value="donasi" id="jenisKegiatanDonasi" {{ in_array('donasi', request('jenis_kegiatan', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="jenisKegiatanDonasi">
                    Donasi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input jenis-kegiatan-checkbox" type="checkbox" name="jenis_kegiatan[]" value="relawan" id="jenisKegiatanRelawan" {{ in_array('relawan', request('jenis_kegiatan', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="jenisKegiatanRelawan">
                    Relawan
                </label>
            </div>
        </div>

        <!-- JENIS DONASI -->
        <button id="jenisDonasiButton" class="btn w-100 text-start mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#jenisDonasiCollapse" aria-expanded="false" aria-controls="jenisDonasiCollapse">
            Jenis Donasi
            <img class="dropdown-img float-end" src="{{ asset('Image/general/drop.png') }}" alt="" width="15px" height="15px" class="float-end">
        </button>
        <div class="collapse filter-section mt-2" id="jenisDonasiCollapse">
            @foreach($jenisDonasiList as $jenisDonasiDibutuhkan)
                <div class="form-check">
                    <input class="form-check-input jenis-donasi-checkbox" type="checkbox" name="jenis_donasi[]" value="{{ $jenisDonasiDibutuhkan }}" id="jenisDonasi{{ $jenisDonasiDibutuhkan }}" {{ in_array($jenisDonasiDibutuhkan, request('jenis_donasi', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenisDonasi{{ $jenisDonasiDibutuhkan }}">
                        @if ($jenisDonasiDibutuhkan == "Keperluan_Mandi")
                            Keperluan Mandi
                        @elseif ($jenisDonasiDibutuhkan == "Keperluan_Rumah")
                            Keperluan Rumah
                        @elseif ($jenisDonasiDibutuhkan == "Alat_Tulis")
                            Alat Tulis
                        @elseif ($jenisDonasiDibutuhkan == "Keperluan_Ibadah")
                            Keperluan Ibadah
                        @else
                            {{ $jenisDonasiDibutuhkan }}
                        @endif
                    </label>
                </div>
            @endforeach
        </div>

        <!-- JENIS KEGIATAN RELAWAN -->
        <button id="jenisRelawanButton" class="btn w-100 text-start mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#jenisKegiatanRelawanCollapse" aria-expanded="false" aria-controls="jenisKegiatanRelawanCollapse">
            Jenis Kegiatan Relawan
            <img class="dropdown-img float-end" src="{{ asset('Image/general/drop.png') }}" alt="" width="15px" height="15px" class="float-end">
        </button>
        <div class="collapse filter-section mt-2" id="jenisKegiatanRelawanCollapse">
            @foreach($jenisRelawanList as $jenisRelawan)
                <div class="form-check">
                    <input class="form-check-input jenis-relawan-checkbox" type="checkbox" name="jenisRelawan[]" value="{{ $jenisRelawan }}" id="jenisRelawan{{ $jenisRelawan }}" {{ in_array($jenisRelawan, request('jenis_kegiatan_relawan', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenisRelawan{{ $jenisRelawan }}">
                        @if ($jenisRelawan == "Bencana_Alam")
                            Bencana Alam
                        @elseif ($jenisRelawan == "Darurat_Bencana")
                            Darurat Bencana
                        @elseif ($jenisRelawan == "Seni_Budaya")
                            Seni Budaya
                        @else
                            {{ $jenisRelawan }}
                        @endif
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybV6K6M0P8BrH9Q91Ni1xWUt3lrYb8aFtyHfoGibLvrHh3Smx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-j54U/BrmvRRvT6hhi5lyhaCqio3CFLVXG/B46xWvS5B1UQo1HK5w7HaGEnlVJiz8" crossorigin="anonymous"></script>
</body>
</html>
