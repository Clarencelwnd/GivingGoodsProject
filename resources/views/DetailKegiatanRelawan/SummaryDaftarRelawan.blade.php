@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Summary Daftar Relawan')

@section('stylesheets')
    @parent
    {{-- <link rel="stylesheet" href="styles.css"> --}}
    <link href="{{ asset('css/DetailKegiatanRelawan/SummaryDaftarRelawan.css') }}" rel="stylesheet">
    <script src="{{ asset('js/DetailKegiatanRelawan/SummaryDaftarRelawan.js') }}"></script>
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
@endsection


    @section('content')
    <div class="containerSummaryDaftarRelawan">
        <div class="title">
            <a href="javascript:history.back()">
                <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="40px"></a>
            <h1 id="judul-daftar-kegiatan">Daftar Kegiatan</h1>
        </div>

        <form action="{{ route('storeSummaryDaftarRelawan') }}" method="POST">
            @csrf
            <input type="hidden" name="idKegiatanRelawan" value="{{ $kegiatanRelawan->IDKegiatanRelawan }}">
            <input type="hidden" name="idDonaturRelawan" value="{{ $donaturRelawan->IDDonaturRelawan }}">

        <div class="info-container">
            <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="24px">
            <div class="info-text-container">
                Tolong pastikan bahwa informasi berikut sudah benar
            </div>
        </div>

        <div class="section">
            <div class="subtitle">Nama Relawan</div>
            <div class="text">{{ $data['nama_relawan'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Nomor HP Relawan</div>
            <div class="text">{{ $data['no_hp_relawan'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Jenis Kegiatan Relawan</div>
            <div class="text">{{ $kegiatanRelawan->JenisKegiatanRelawan }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Alasan Menjadi Relawan</div>
            <div class="text">{{ $data['alasan_relawan'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Jam & Tanggal Kegiatan</div>
            <div class="flex-row">
                <img src="{{ asset('image/general/calendar.png') }}" alt="Calendar Icon" height="24px">
                <div class="text">{{ $data['tanggal_kegiatan'] }}</div>
            </div>
            <div class="flex-row">
                <img src="{{ asset('image/general/time.png') }}" alt="Time Icon" height="24px">
                <div class="text">{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }} - {{ $kegiatanRelawan->JamSelesaiKegiatanRelawan }}</div>
            </div>
        </div>

        <div class="note">
            <div class="important-title">Catatan Penting !</div>
            <div class="important-text-note">Pastikan Anda mencatat informasi ini dengan baik untuk memudahkan koordinasi dan komunikasi Anda sebagai relawan dengan penyelenggara kegiatan.</div>
            <div class="important-text">Berikut adalah informasi mengenai panti sosial yang Anda tuju untuk kegiatan relawan:</div>
            <div class="section">
                <div class="subtitle">Nama Penyelenggara</div>
                <div class="text">{{ $kegiatanRelawan->pantiSosial->NamaPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Kontak Penyelenggara</div>
                <div class="text">{{ $kegiatanRelawan->pantiSosial->NomorTeleponPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Lokasi Kegiatan Relawan</div>
                <div class="text">{{ $kegiatanRelawan->LokasiKegiatanRelawan }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Persyaratan dan Instruksi yang perlu diikuti</div>
                <div class="text">{{ $kegiatanRelawan->SyaratDanInstruksiKegiatanRelawan }}</div>
            </div>
            <div class="tips">
                <div class="text">
                    <span style="font-weight: 800">Tips:</span>
                    <ul>
                        <li>Anda dapat menyimpan informasi ini di notes ponsel Anda atau di tempat yang mudah diakses.</li>
                        <li>Anda juga dapat membuat screenshot dari informasi ini untuk disimpan di galeri foto Anda.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-help-platform" id="container-help-platform">
            <div class="header">
                <div class="text-help">Bantu GivingGoods Terus Berkembang!</div>
                <div class="arrow" onclick="toggleDropdown()">
                    <img src="{{ asset('Image/general/drop.png') }}" alt="dropdown" width="20px" height="20px">
                </div>
            </div>
            <div class="dropdown-content">
                <span style="font-weight: 400; font-size: 22px; color: #006374;">
                    Ayo dukung pengembangan website kami! Setiap donasi Anda sangat berarti bagi kami untuk <br> terus meningkatkan layanan.
                </span>
                <div class="donation-info">
                    <div class="text-help" style="font-weight: 400;">Gunakan QR code di bawah ini untuk berdonasi sekarang:</div>
                    <img src="{{ asset('image/general/barcode.png') }}" alt="QR Code" class="barcode">
                    <div class="text-help" style="font-weight: 500;">Terima kasih atas dukungan Anda!</div>
                </div>
            </div>
        </div>

        <button type="submit" class="button">Daftar Sekarang</button>
    </form>
    </div>


{{-- POPUP TERIMAKASIH --}}
        <div id="popup-container" style="display: none;">
                <div id="popup">
                    <h3 style="color: #1C3F5B; font-size: 26px; font-weight: 600;">Terima kasih telah berbagi kebaikan!</h3>
                    <p style="margin-top: 10px; font-size: 18px; font-weight: 300; color: #1C3F5B;">Kami sangat menghargai dukungan Anda. <br> <br>
                        Pihak {{ $kegiatanRelawan->pantiSosial->NamaPantiSosial }} telah kami informasikan. <br> <br>
                        Untuk informasi lebih lanjut, mohon tunggu untuk dihubungi atau jangan ragu <br> untuk menghubungi langsung melalui <span style="font-weight: 600;">{{ $kegiatanRelawan->pantiSosial->NomorTeleponPantiSosial }}</span>.</p>
                    <div style="display: flex; justify-content: center; margin-top: 20px;">
                        <button class="btn-primary" style="font-weight: 600; font-size: 16px;" onclick="closePopup()">OK</button>
                    </div>
                </div>
        </div>

        @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('popup-container').style.display = 'block';
            });
        </script>
        @endif
    <script>

         function toggleDropdown() {
            const dropdown = document.querySelector('.dropdown-content');
            const arrow = document.querySelector('.arrow');
            const displayState = dropdown.style.display;

            dropdown.style.display = displayState === 'block' ? 'none' : 'block';
            arrow.classList.toggle('rotate');
        }

        function closePopup() {
            document.getElementById('popup-container').style.display = 'none';
            window.location.href = "{{ route('displayDaftarKegiatan', ['id' => $donaturRelawan->IDDonaturRelawan]) }}";
        }
    </script>

@endsection
</html>
