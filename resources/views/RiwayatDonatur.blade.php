<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Donatur</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<style>

h1 {
    font-weight: 600;
    font-size: 36px;
    margin: 0;
    display: flex;
    color: #007C92;
    align-items: center;
}

.title-back {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.btn-back {
    width: 40px;
    height: 40px;
    margin-right: 10px;
    margin-top: -10px;
}

.total-donatur {
    font-size: 18px;
    margin-top: 10px;
    margin-left: auto;
}
.total-jumlah {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 50px 20px;
}
.col p {
    color: #006374;
    font-weight: 500;
    font-size: 22px;
}
.jumlah p {
    color: #1C3F5B;
    font-weight: 500;
    font-size: 20px;
}
.jumlah {
    margin-left: 180px;
}

.table {
    border-collapse: collapse;
    width: 100%;
}

.table th {
    border-bottom: 1px solid #ddd;
    text-align: center;
    padding-bottom: 20px
}

.table td {
    text-align: center;
    padding-top: 20px;
    font-size: 20px;
}

.table th {
    font-weight: 500;
    font-size: 22px;
    color: #006374;
}

.btn-confirmation {
        background-color: white;
        color: #005739;
        border: 2px solid #005739;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 16px;
    }

.btn-confirmation.clicked {
        background-color: #DFDFDF;
        color: #727272;
        border: none;
    }
.btn-detail {
    background-color: white;
    color: #00925F;
    border: 2px solid #00925F;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.container {
    padding: 40px;
}


/* Popup styles */
.popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: white;
    padding: 40px;
    border-radius: 5px;
    width: 500px;
    max-height: 80%;
    overflow-y: auto;
}

.popup-header {
    display: flex;
    align-items: center;
    position: relative;
    padding-bottom: 20px;
}

.popup-title {
    font-weight: 600;
    font-size: 32px;
    color: #1C3F5B;
    margin: 0 auto;
    text-align: center;
    flex-grow: 1;
}

.popup-close {
    position: absolute;
    right: 0;
    cursor: pointer;
}


.popup-close img {
    width: 20px;
    height: 20px;
}

.popup-subtitle {
    font-size: 22px;
    font-weight: 500;
    color: #007C92;
    margin-top: 20px;
}

.popup-data {
    margin-bottom: 10px;
}


.footer {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        padding-bottom: 10px;
    }

    .copyright-image {
       height: 25px;
    }


</style>

<body>
    <div class="container">

        <div class="title-back">
            <div class="back">
                <a href="{{ route('kegiatan-donasi.show', ['id' => request()->id]) }}">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px">
                </a>
            </div>
            <div class="col">
                <h1 style="font-weight: 600; font-size: 36px;">Riwayat Donatur</h1>
            </div>
        </div>


        <div class="total-jumlah">
            <div class="col">
                <p>Total Donatur</p>
            </div>
            <div class="jumlah">
                <p>{{ $jumlahKonfirmasiDiterima }} orang</p> <!-- Updated -->
            </div>
        </div>


        <div class="table-riwayat">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Donatur</th>
                            <th>No HP</th>
                            <th>Jam & Tanggal Donasi</th>
                            <th>Konfirmasi</th>
                            <th>Sudah dihubungi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($registrasiDonatur as $registrasi)
                        <tr>
                            <td>{{ $registrasi->donaturRelawan->NamaDonaturRelawan }}</td>
                            <td>{{ $registrasi->donaturRelawan->NomorTeleponDonaturRelawan }}</td>
                            <td>{{ $registrasi->jamTanggalDonasi }}</td>
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
                                <input type="checkbox" name="sudah_dihubungi[]" value="1" style="transform: scale(1.5);">
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


<div class="footer">
    <img src="{{ asset('image/footer/copyright.png') }}" alt="Copyright" class="copyright-image">
</div>
</body>
</html>
