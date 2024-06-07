<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Relawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* Gaya CSS di sini */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
    padding: 40px 70px;
}

.title {
    display: flex;
    align-items: center;
    flex-direction: row;
    padding-bottom: 50px;
}

.title img {
    display: flex;
    padding-top: 10px;
    padding-right: 10px;
}
.title h1 {
    font-weight: 600;
    color: #007C92;
    font-size: 36px;
    margin-bottom: 10px;
}

        .input-container{
            padding-bottom: 20px;
        }
        .subtitle {
            color: #193952;
            font-weight: 400;
            font-size: 24px;
            padding-bottom: 20px;
        }
        .subtitle-time-date {
            color: #193952;
            font-weight: 400;
            font-size: 24px;
            padding-top: 20px;
        }
        .input-field {
            background-color: #f0f0f0;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .info-text {
            color: #898989;
            font-weight: 400;
            font-size: 22px;
            padding: 15px 0px;
        }
        .info-container {
            border: 1px solid #ccc1c1;
            padding: 20px;
            display: flex;
            align-items: center;
        }
        .info-container img {
            margin-right: 10px;
        }
        .info-text-container {
            flex: 1;
        }

        .time-date-container {
    display: flex;
    padding-top: 30px;
}

.date-picker-container, .time-picker-container {
    display: flex;
    align-items: center;
    padding-right: 400px;
}

.icon {
    margin-right: 10px;
    margin-bottom: 10px;
    height: 24px;

}

.input-field {
    background-color: #E0E0E0 ;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
}

        .button {
            display: block;
            width: 100%;
            padding: 15px 0;
            text-align: center;
            font-size: 32px;
            color: white;
            font-weight: 600;
            background-color: #00C27E;
            border: none;
            border-radius: 5px;
            margin-top: 40px;
            text-decoration: none;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="title">
            <a href="javascript:history.back()">
                <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
            <h1>Daftar Kegiatan</h1>
        </div>

        <!-- Subtitles and Input Fields -->
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
            <input type="text" class="input-field" name="alasan_relawan" id="alasan_relawan_field">
        </div>

        <!-- Additional Information -->
        <div class="subtitle-time-date">Ketersedian Waktu Untuk Bergabung</div>
        <div class="info-text">Silakan memilih salah satu hari dalam rentang waktu kegiatan
            relawan berlangsung. Apabila Anda ingin <br> mendaftar untuk lebih dari satu hari, harap sampaikan
             langsung ke pihak panti sosial terkait setelah <br> mendaftarkan diri.</div>

        <!-- Info Container -->
        <div class="info-container">
            <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="24px">
            <div class="info-text-container">
                Apabila kegiatan berlangsung lebih dari satu hari, pastikan Anda dapat mengikuti kegiatan pada batch waktu yang Anda pilih untuk <br> setiap hari tersebut.
            </div>
        </div>

        <div class="time-date-container">
            <!-- Div 1 -->
            <div class="date-picker-container">
                <img src="{{ asset('image/general/calendar.png') }}" alt="Calendar Icon" class="icon">
                <input type="text" id="date-picker" class="input-field" name="tanggal_kegiatan">
            </div>

            <!-- Div 2 -->
            <div class="time-picker-container">
                <img src="{{ asset('image/general/time.png') }}" alt="Time Icon" class="icon">
                <input type="text" class="input-field" name="jam_kegiatan" value="{{ $kegiatanRelawan->JamMulaiKegiatanRelawan }} - {{ $kegiatanRelawan->JamSelesaiKegiatanRelawan }}" readonly>
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
            // Copy values from input fields to hidden inputs
            document.getElementById('nama_relawan').value = document.getElementById('nama_relawan_field').value;
            document.getElementById('no_hp_relawan').value = document.getElementById('no_hp_relawan_field').value;
            document.getElementById('alasan_relawan').value = document.getElementById('alasan_relawan_field').value;
            document.getElementById('tanggal_kegiatan').value = document.getElementById('date-picker').value;

            // Submit the form
            document.getElementById('submit-form').submit();
        }
    </script>
</body>
</html>
