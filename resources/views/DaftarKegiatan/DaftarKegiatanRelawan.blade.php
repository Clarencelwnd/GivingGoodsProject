@extends('generalPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Formulir Daftar Relawan')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="{{ asset('css/DaftarKegiatan/daftarKegiatanRelawan.css') }}" rel="stylesheet">
    <script src="{{ asset('js/Artikel/DaftarKegiatanRelawan.js') }}"></script>
@endsection

    @section('content')
    <div class="container">

        <div class="title">
            <a href="javascript:history.back()">
                <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
            <h1>Daftar Kegiatan</h1>
        </div>

        <div class="input-container">
            <div class="subtitle">Nama Relawan</div>
            <input type="text" class="input-field" name="nama_relawan" id="nama_relawan_field" value="{{ $donaturRelawan->NamaDonaturRelawan }}" readonly style="background-color: #f0f0f0;">
        </div>

        <div class="input-container">
            <div class="subtitle">No HP Relawan</div>
            <input type="text" class="input-field" name="no_hp_relawan" id="no_hp_relawan_field" value="{{ $donaturRelawan->NomorTeleponDonaturRelawan }}" readonly style="background-color: #f0f0f0;">
        </div>

        <div class="input-container">
            <div class="subtitle">Alasan Menjadi Relawan</div>
            <input type="text" class="input-field" name="alasan_relawan" id="alasan_relawan_field" value="{{ old('alasan_relawan') }}">
            @error('alasan_relawan')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="subtitle-time-date">Ketersedian Waktu Untuk Bergabung</div>
        <div class="info-text">Silakan memilih salah satu hari dalam rentang waktu kegiatan
            relawan berlangsung. Apabila Anda ingin <br> mendaftar untuk lebih dari satu hari, harap sampaikan
             langsung ke pihak panti sosial terkait setelah <br> mendaftarkan diri.</div>

        <div class="info-container">
            <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="24px">
            <div class="info-text-container">
                Apabila kegiatan berlangsung lebih dari satu hari, pastikan Anda dapat mengikuti kegiatan pada batch waktu yang Anda pilih untuk <br> setiap hari tersebut.
            </div>
        </div>

        <div class="time-date-container">
            <div class="input-container">
                <div class="date-picker-container">
                    <img src="{{ asset('image/general/calendar.png') }}" alt="Calendar Icon" class="icon">
                    <input type="text" id="date-picker" class="input-field-date-time" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}">
                </div>
                @error('tanggal_kegiatan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="time-picker-container">
                <img src="{{ asset('image/general/time.png') }}" alt="Time Icon" class="icon">
                <input type="text" class="input-field-date-time" name="jam_kegiatan" value="{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }} - {{ $kegiatanRelawan->JamSelesaiKegiatanRelawan }}" readonly style="background-color: #f0f0f0;">
            </div>
        </div>

        <a href="#" class="button" onclick="event.preventDefault(); submitForm()">Lanjut</a>

        <!-- Form Hidden Fields -->
        <form id="submit-form" action="{{ route('storeDaftarKegiatanRelawan') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="nama_relawan" id="nama_relawan">
            <input type="hidden" name="no_hp_relawan" id="no_hp_relawan">
            <input type="hidden" name="alasan_relawan" id="alasan_relawan">
            <input type="hidden" name="tanggal_kegiatan" id="tanggal_kegiatan">
            <input type="hidden" name="IDKegiatanRelawan" value="{{ $kegiatanRelawan->IDKegiatanRelawan }}">
            <input type="hidden" name="IDDonaturRelawan" value="{{ $donaturRelawan->IDDonaturRelawan }}">
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date-picker", {
            dateFormat: "Y-m-d",
        });


        function submitForm() {
            document.getElementById('nama_relawan').value = document.getElementById('nama_relawan_field').value;
            document.getElementById('no_hp_relawan').value = document.getElementById('no_hp_relawan_field').value;
            document.getElementById('alasan_relawan').value = document.getElementById('alasan_relawan_field').value;
            document.getElementById('tanggal_kegiatan').value = document.getElementById('date-picker').value;

            document.getElementById('submit-form').submit();
        }
    </script>

@endsection
</html>
