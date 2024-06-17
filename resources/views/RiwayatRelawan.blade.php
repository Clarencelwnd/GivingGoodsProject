@extends('templatePage')

@section('title', 'Riwayat Donatur')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
    <link href="{{ asset('css/RiwayatRelawan.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">

    <div class="title-back">
        <div class="back">
            <a href="{{ route('kegiatan-relawan.show', ['id' => request()->id]) }}">
                <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px">
            </a>
        </div>
        <div class="col">
            <h1 style="font-weight: 600; font-size: 36px;">Riwayat Relawan</h1>
        </div>
    </div>

    <div class="total-jumlah">
        <div class="col">
            <p>Total Relawan Mendaftar</p>
        </div>
        <div class="jumlah">
            <p>{{ $jumlahKonfirmasiDiterima }} orang</p>
        </div>
    </div>

    <div class="table-riwayat">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Relawan</th>
                        <th>Nomor Handphone</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Waktu Kegiatan</th>
                        <th>Konfirmasi</th>
                        <th>Sudah dihubungi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($registrasiRelawan as $registrasi)
                    <tr>
                        <td>{{ $registrasi->donaturRelawan->NamaDonaturRelawan }}</td>
                        <td>{{ $registrasi->donaturRelawan->NomorTeleponDonaturRelawan }}</td>
                        <td>{{ $registrasi->tanggalKegiatan }}</td>
                        <td>{{ $registrasi->waktuKegiatan }}</td>
                        <td>
                            <form action="{{ route('update-status-relawan', ['IDRegistrasiRelawan' => $registrasi->IDRegistrasiRelawan]) }}" method="POST">
                                @csrf
                                @method('POST')

                                <!-- Tombol "Terima" -->
                                <button type="submit" name="terima" class="btn-confirmation accept
                                    @if($registrasi->StatusRegistrasiRelawan == 'Terima') clicked @elseif($registrasi->StatusRegistrasiRelawan == 'Ditolak') inactive @endif"
                                    @if($registrasi->StatusRegistrasiRelawan == 'Terima' || $registrasi->StatusRegistrasiRelawan == 'Ditolak') disabled @endif>
                                    Terima
                                </button>

                                <!-- Tombol "Tolak" -->
                                <button type="submit" name="tolak" class="btn-confirmation reject
                                    @if($registrasi->StatusRegistrasiRelawan == 'Ditolak') clicked @elseif($registrasi->StatusRegistrasiRelawan == 'Terima') inactive @endif"
                                    @if($registrasi->StatusRegistrasiRelawan == 'Terima' || $registrasi->StatusRegistrasiRelawan == 'Ditolak') disabled @endif>
                                    Tolak
                                </button>
                            </form>


                        </td>


                        <td>
                            <form id="checkbox-form-{{ $registrasi->IDRegistrasiRelawan }}" action="{{ route('update-status-checkbox-relawan', ['IDRegistrasiRelawan' => $registrasi->IDRegistrasiRelawan]) }}" method="POST">
                                @csrf
                                <input id="sudah_dihubungi_checkbox_{{ $registrasi->IDRegistrasiRelawan }}" type="checkbox" name="sudah_dihubungi" value="1" style="transform: scale(1.5);" @if($registrasi->StatusDihubungi == 'Sudah') checked @endif>
                            </form>
                            <script>
                                var checkbox = document.getElementById('sudah_dihubungi_checkbox_{{ $registrasi->IDRegistrasiRelawan }}');
                                checkbox.addEventListener('change', function() {
                                    document.getElementById('checkbox-form-{{ $registrasi->IDRegistrasiRelawan }}').submit();
                                });

                                // Set checkbox checked status based on server response
                                var status = "{{ $registrasi->StatusDihubungi }}";
                                if (status === 'Sudah') {
                                    checkbox.checked = true;
                                }
                            </script>
                        </td>

                        <td>
                            <button class="btn-detail"
                            onclick="openPopup(
                                '{{ $registrasi->donaturRelawan->NamaDonaturRelawan }}',
                                '{{ $registrasi->donaturRelawan->NomorTeleponDonaturRelawan }}',
                                '{{ $registrasi->AlasanRegistrasiRelawan }}',
                                '{{ $registrasi->waktuKegiatan }}',
                                '{{ $registrasi->tanggalKegiatan  }}',
                            )">Lihat Detail</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>



    <div class="popup-overlay" id="popup">
    <div class="popup-content">
        <div class="popup-header">
            <div class="popup-title">Detail Relawan</div>
            <div class="popup-close" onclick="closePopup()">
                <img src="{{ asset('image/general/close.png') }}" alt="Close">
            </div>
        </div>
        <!-- Popup data -->
        <div class="popup-subtitle">Nama Relawan</div>
        <div class="popup-data" id="popup-nama"></div>

        <div class="popup-subtitle">Nomor Handphone</div>
        <div class="popup-data" id="popup-hp"></div>

        <div class="popup-subtitle">Alasan Bergabung</div>
        <div class="popup-data" id="popup-alasan"></div>

        <div class="popup-subtitle">Shift yang dipilih</div>
        <div class="popup-data" id="popup-shift"></div>

        <div class="popup-subtitle">Tanggal Kegiatan</div>
        <div class="popup-data" id="popup-tanggal"></div>
    </div>
    </div>

    <script>
    function openPopup(nama, hp, alasan, shift, tanggal) {
        document.getElementById('popup-nama').innerText = nama;
        document.getElementById('popup-hp').innerText = hp;
        document.getElementById('popup-alasan').innerText = alasan;
        document.getElementById('popup-shift').innerText = shift;
        document.getElementById('popup-tanggal').innerText = tanggal;

        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
    </script>
@endsection
