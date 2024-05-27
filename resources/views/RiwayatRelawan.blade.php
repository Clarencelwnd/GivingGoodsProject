<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Relawan</title>
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
    padding-bottom: 20px;
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
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .btn-confirmation.accept.inactive {
    background-color: #DFDFDF;
    color: #727272;
    border: none;
}
.btn-confirmation.reject.inactive {
    background-color: #DFDFDF;
    color: #727272;
    border: none;
}

/* Styling untuk tombol "Terima" */
.btn-confirmation.accept {
    background-color: white;
    color: #005739;
    border: 2px solid #005739;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 16px;
    margin-bottom: 10px;
}

.btn-confirmation.accept.clicked {
    background-color: #B0ECD7;
    color: #005739;
    border: none;
}

/* Styling untuk tombol "Tolak" */
.btn-confirmation.reject {
    background-color: white;
    color: #005739;
    border: 2px solid #005739;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 16px;
}

.btn-confirmation.reject.clicked {
    background-color: #EFC2BF;
    color: #7A231D;
    border: none;
}

/* Menonaktifkan tombol saat diklik */
.btn-confirmation[disabled] {
    opacity: 0.6;
    cursor: not-allowed;
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
    margin-bottom: 15px;
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
                <a href="#" class="btn-back">
                    <img src="{{ asset('image/general/back.png') }}" alt="Back">
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
                                <form id="checkbox-form-{{ $registrasi->IDRegistrasiRelawan }}" action="{{ route('update-status-checkbox', ['IDRegistrasiRelawan' => $registrasi->IDRegistrasiRelawan]) }}" method="POST">
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


<div class="footer">
    <img src="{{ asset('image/footer/copyright.png') }}" alt="Copyright" class="copyright-image">
</div>
</body>
</html>
