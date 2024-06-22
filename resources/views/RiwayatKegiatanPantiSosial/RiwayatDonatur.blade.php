@extends('GeneralPagePantiSosial.templatePage')

@section('title', 'Riwayat Donatur')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css') }}">
    <link href="{{ asset('css/RiwayatDonaturRelawan/RiwayatDonatur.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="title-back">
            <div class="back">
                <a href="{{ route('kegiatan-donasi.show', ['id' => request()->id]) }}">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="30px" width="30px">
                </a>
            </div>
            <div class="col">
                <h1 id="judul-riwayat-donatur">Riwayat Donatur</h1>
            </div>
        </div>

        <div class="total-jumlah">
            <div class="col">
                <p id="total-donatur">Total Donatur</p>
            </div>
            <div class="jumlah">
                <p id="jumlah-donatur">{{ $jumlahKonfirmasiDiterima }} orang</p> <!-- Updated -->
            </div>
        </div>


        <div class="table-riwayat">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>Nomor Handphone</th>
                            <th>Tanggal & Jam Donasi</th>
                            <th>Konfirmasi</th>
                            <th>Sudah dihubungi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($registrasiDonatur as $registrasi)
                        <tr class="donatur-info">
                            <td style="color: #1C3F5B; font-size: 16px; font-weight: 400;">{{ $registrasi->donaturRelawan->NamaDonaturRelawan }}</td>
                            <td style="color: #1C3F5B; font-size: 16px; font-weight: 400;">{{ $registrasi->donaturRelawan->NomorTeleponDonaturRelawan }}</td>
                            <td  style="color: #1C3F5B; font-size: 16px; font-weight: 400;">{{ $registrasi->jamTanggalDonasi }}</td>
                            <td>
                                <form action="{{ route('update-status', ['IDRegistrasiDonatur' => $registrasi->IDRegistrasiDonatur]) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn-confirmation @if($registrasi->StatusRegistrasiDonatur == 'Konfirmasi Diterima') clicked @endif" @if($registrasi->StatusRegistrasiDonatur == 'Konfirmasi Diterima') disabled @endif>
                                        Konfirmasi Diterima
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form id="checkbox-form-{{ $registrasi->IDRegistrasiDonatur }}" action="{{ route('update-status-checkbox-donatur', ['IDRegistrasiDonatur' => $registrasi->IDRegistrasiDonatur]) }}" method="POST">
                                    @csrf
                                    <input id="sudah_dihubungi_checkbox_{{ $registrasi->IDRegistrasiDonatur }}" type="checkbox" name="sudah_dihubungi" value="1" style="transform: scale(1.5);" @if($registrasi->StatusDihubungi == 'Sudah') checked @endif>
                                </form>
                                <script>
                                    var checkbox = document.getElementById('sudah_dihubungi_checkbox_{{ $registrasi->IDRegistrasiDonatur }}');
                                    checkbox.addEventListener('change', function() {
                                        document.getElementById('checkbox-form-{{ $registrasi->IDRegistrasiDonatur }}').submit();
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
                                    '{{ $registrasi->jamTanggalDonasi }}',
                                    '{{ $registrasi->JenisDonasiDidonasikan }}',
                                    '{{ $registrasi->DeskripsiBarangDonasi }}'
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
                <div class="popup-title">Detail Donatur</div>
                <div class="popup-close" onclick="closePopup()">
                    <img src="{{ asset('image/general/close.png') }}" alt="Close">
                </div>
            </div>
            <!-- Popup data -->
            <div class="popup-subtitle">Nama Donatur</div>
            <div class="popup-data" id="popup-nama"></div>

            <div class="popup-subtitle">Nomor HP</div>
            <div class="popup-data" id="popup-hp"></div>

            <div class="popup-subtitle">Jam & Tanggal Donasi</div>
            <div class="popup-data" id="popup-tanggal"></div>

            <div class="popup-subtitle">Jenis Donasi</div>
            <div class="popup-data" id="popup-jenis"></div>

            <div class="popup-subtitle">Deskripsi Donasi</div>
            <div class="popup-data" id="popup-deskripsi"></div>
        </div>
    </div>

    <script>
        function handleConfirmationClick(button) {
            if (!button.classList.contains('clicked')) {
                button.classList.add('clicked');
                button.disabled = true;
            }
        }

        function openPopup(nama, hp, tanggal, jenis, deskripsi) {
            document.getElementById('popup-nama').innerText = nama;
            document.getElementById('popup-hp').innerText = hp;
            document.getElementById('popup-tanggal').innerText = tanggal;
            document.getElementById('popup-jenis').innerText = jenis;
            document.getElementById('popup-deskripsi').innerText = deskripsi;

            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
@endsection

