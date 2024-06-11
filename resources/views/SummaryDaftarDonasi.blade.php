<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Daftar Donasi</title>
    <link rel="stylesheet" href="styles.css">
</head>


<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f9f9f9;
}

.container {
    padding: 50px 100px;
}

.title {
    display: flex;
    align-items: center;
    flex-direction: row;
    padding-bottom: 20px;
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
.info-container {
            border: 1px solid #ccc1c1;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .info-container img {
            margin-right: 10px;
        }
        .info-text-container {
            flex: 1;
        }
.section {
    margin-top: 30px;
    margin-bottom: 40px;
}

.subtitle {
    color: #006374;
    font-size: 24px;
    font-weight: 500;
    padding-bottom: 5px;
}

.text {
    color: #1C3F5B;
    font-size: 22px;
    font-weight: 400;
    margin-top: 5px;
}

.note {
    background-color: #FFF3D0;
    padding: 20px;
    border-radius: 10px;
}

.important-title {
    color: #006374;
    font-size: 30px;
    font-weight: 800;
    margin-bottom: 10px;
}

.important-text {
    color: #1C3F5B;
    font-size: 22px;
    font-weight: 400;
    margin-bottom: 15px;
}

.important-text-note {
    color: #006374;
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 15px;
}

.tips .text {
    color: #163249;
    font-size: 20px;
    font-weight: 400;
}

.tips ul {
    list-style-type: disc;
    margin: 10px 0 0 20px;
    padding: 0;
}

.tips li {
    margin-bottom: 10px;
}

.flex-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .flex-row img {
            margin-right: 10px;
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

        .container-help-platform {
            display: flex;
            flex-direction: column;
            border: 1px solid #006374;
            border-radius: 1px;
            padding: 10px;
            color: #006374;
            position: relative;
            background: white;
            margin-top: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text-help {
            font-size: 24px;
            font-weight: 600;
            color: #006374;
        }

        .arrow {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .rotate {
            transform: rotate(180deg);
        }

        .dropdown-content {
            display: none;
            margin-top: 10px;
            padding: 10px;
        }

        .donation-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .donation-info .text-help {
            font-size: 24px;
            color: #006374;
        }

        .donation-info .barcode {
            margin: 20px 0;
            height: 200px;
        }


        #popup-container{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

#popup {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFFFFF;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 4px;
    width: auto;
    text-align: center;
}

.btn-primary{
    width: 70%;
    padding: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    font-size: 16px;
    margin-top: 10px;
}
.btn-primary {
    background-color: #00AF71;
    color: #FFFFFF;
}

.text div {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.text div span {
    width: 120px;
    display: inline-block;
    margin-right: 10px;
}
</style>
<body>
    <div class="container">

        <div class="title">
            <a href="javascript:history.back()">
                <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
            <h1>Daftar Kegiatan</h1>
        </div>

        <form action="{{ route('storeSummaryDaftarDonasi') }}" method="POST">
            @csrf
            <input type="hidden" name="idKegiatanRelawan" value="{{ $kegiatanDonasi->IDKegiatanDonasi }}">
            <input type="hidden" name="idDonaturRelawan" value="{{ $donaturRelawan->IDDonaturRelawan }}">

        <div class="info-container">
            <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="24px">
            <div class="info-text-container">
                Tolong pastikan bahwa informasi berikut sudah benar
            </div>
        </div>

        <div class="section">
            <div class="subtitle">Nama Relawan</div>
            <div class="text">{{ $data['nama_donatur'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Nomor HP Relawan</div>
            <div class="text">{{ $data['no_hp_donatur'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Jenis Donasi</div>
            <div class="text">{{ $data['jenis_donasi'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Deskripsi Donasi</div>
            <div class="text">{{ $data['deskripsi_barang'] }}</div>
        </div>

        <div class="section">
            <div class="subtitle">Pengiriman Barang</div>
            <div class="text">{{ $data['pengiriman_barang'] }}</div>
        </div>
        <div class="section">
            <div class="subtitle">Jam & Tanggal Kegiatan</div>
            <div class="flex-row">
                <img src="{{ asset('image/general/calendar.png') }}" alt="Calendar Icon" height="24px">
                <div class="text">{{ $data['tanggal_kegiatan'] }}</div>
            </div>
            <div class="flex-row">
                <img src="{{ asset('image/general/time.png') }}" alt="Time Icon" height="24px">
                <div class="text">{{ $data['jam_mulai_kegiatan'] ?? 'Tunggu info lebih lanjut dari panti sosial' }}</div>
            </div>
        </div>

        <div class="note">
            <div class="important-title">Catatan Penting !</div>
            <div class="important-text-note">
                @if ($data['pengiriman_barang'] == 'Antar sendiri')
                    Pastikan Anda mencatat informasi ini dengan baik untuk memudahkan proses pengiriman.
                @elseif ($data['pengiriman_barang'] == 'Menggunakan jasa pengiriman (Gosend/Grab Express/Lalamove/dll..)')
                    Pastikan Anda mencatat informasi ini dengan baik untuk memudahkan proses pengiriman donasi Anda dengan kurir. Jangan lupa untuk menginfokan panti sosial berkaitan dengan nomor resi atau link tracking pengiriman donasi.
                @elseif ($data['pengiriman_barang'] == 'Menggunakan jasa pickup panti sosial')
                    Pihak Panti Sosial akan menghubungi Anda terkait waktu untuk melakukan pickup barang donasi. Mohon untuk menunggu informasi lebih lanjut.
                @endif
            </div>
            <div class="important-text">Berikut adalah informasi mengenai panti sosial yang Anda tuju untuk menyalurkan donasi Anda:</div>
            <div class="section">
                <div class="subtitle">Nama Panti Sosial</div>
                <div class="text">{{ $kegiatanDonasi->pantiSosial->NamaPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Kontak Panti Sosial</div>
                <div class="text">{{ $kegiatanDonasi->pantiSosial->NomorTeleponPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Alaman Panti Sosial</div>
                <div class="text">{{ $kegiatanDonasi->pantiSosial->AlamatPantiSosial }}</div>
            </div>
            <div class="section">
                <div class="subtitle">Jam Operasional</div>
                <div class="text">
                    @foreach($kegiatanDonasi->PantiSosial->JadwalOperasional->groupBy('Hari') as $hari => $jadwals)
                    <div>
                        <span>{{ $hari }}&nbsp;:</span>
                        @foreach($jadwals as $jadwal)
                            {{ $jadwal->JamBukaPantiSosial }} - {{ $jadwal->JamTutupPantiSosial }}
                        @endforeach
                    </div>
                @endforeach
                </div>
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

        <div class="container-help-platform">
            <div class="header">
                <div class="text-help">Bantu GivingGoods Terus Berkembang!</div>
                <div class="arrow" onclick="toggleDropdown()">&#x25BC;</div>
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
                        Pihak {{ $kegiatanDonasi->pantiSosial->NamaPantiSosial }} telah kami informasikan. <br> <br>
                        Sebelum melakukan donasi, mohon tunggu untuk dihubungi atau jangan ragu <br> untuk menghubungi langsung melalui <span style="font-weight: 600;">{{ $kegiatanDonasi->pantiSosial->NomorTeleponPantiSosial }}</span>.</p>
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
    }
    </script>
</body>
</html>
