<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Donasi</title>
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
        .info-text {
            color: #898989;
            font-weight: 400;
            font-size: 22px;
            padding: 15px 0px;
        }
        .time-date-container {
    display: flex;
    padding-top: 30px;
}

.date-picker-container, .time-picker-container {
    display: flex;
    align-items: center;
    padding-right: 300px;
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
    font-size: 16px;
    margin-bottom: 10px;
    border-radius: 5px;
    box-sizing: border-box;
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
.dropdown {
    position: relative;
}
.arrow {
    position: absolute;
    right: 10px;
    top: 20%;
    cursor: pointer;
    transition: transform 0.3s;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #FDFFFE;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    width: 100%;
    box-sizing: border-box;
    margin-top: 2px;
}

.dropdown-item {
    padding: 10px;
    color: #193952;
    font-weight: 400;
    font-size: 20px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #f1f1f1;
}

.text-instruction{
    color: #898989;
    font-weight: 400;
    font-size: 22px;
}

.text-instruction div {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.text-instruction div span {
    width: 120px;
    display: inline-block;
    margin-right: 10px;
}


#selected-options {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;

.selected-item {
    margin-right: 10px;
    border: 1px solid #006374;
    padding: 5px 10px;
    border-radius: 5px;
    background-color: #E0F2F1;
    color: #006374;
    font-size: 16px;
    font-weight: 500;
    display: flex;
    align-items: center;
}

.close-btn {
    margin-left: 5px;
    cursor: pointer;
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
            <div class="subtitle">Nama Donatur</div>
            <input type="text" class="input-field" name="nama_relawan" id="nama_relawan_field" value="{{ $donaturRelawan->NamaDonaturRelawan }}" readonly style="background-color: #f0f0f0;">
        </div>

        <div class="input-container">
            <div class="subtitle">No HP Donatur</div>
            <input type="text" class="input-field" name="no_hp_relawan" id="no_hp_relawan_field" value="{{ $donaturRelawan->NomorTeleponDonaturRelawan }}" readonly style="background-color: #f0f0f0;">
        </div>

        <div class="input-container">
            <div class="subtitle">Jenis Donasi</div>
            <div class="dropdown">
                <div id="selected-options"></div>
                <input type="text" class="input-field" name="jenis_donasi" id="jenis_donasi_field" readonly>
                <img src="{{ asset('image/general/drop.png') }}" class="arrow" id="dropdown_arrow" alt="Dropdown Arrow">
                <div class="dropdown-content" id="dropdown_content">
                    <div class="dropdown-item" onclick="selectOption('Pakaian')"><span>Pakaian</span></div>
                    <div class="dropdown-item" onclick="selectOption('Makanan')"><span>Makanan</span></div>
                    <div class="dropdown-item" onclick="selectOption('Obat-obatan')"><span>Obat-obatan</span></div>
                    <div class="dropdown-item" onclick="selectOption('Buku-buku')"><span>Buku-buku</span></div>
                    <div class="dropdown-item" onclick="selectOption('Keperluan Ibadah')"><span>Keperluan Ibadah</span></div>
                    <div class="dropdown-item" onclick="selectOption('Mainan')"><span>Mainan</span></div>
                    <div class="dropdown-item" onclick="selectOption('Perlengkapan Mandi')"><span>Perlengkapan Mandi</span></div>
                    <div class="dropdown-item" onclick="selectOption('Keperluan Rumah')"><span>Keperluan Rumah</span></div>
                    <div class="dropdown-item" onclick="selectOption('Alat Tulis')"><span>Alat Tulis</span></div>
                    <div class="dropdown-item" onclick="selectOption('Sepatu')"><span>Sepatu</span></div>
                </div>
            </div>
        </div>


        <div class="input-container">
            <div class="subtitle">Deskripsi Barang Donasi</div>
            <input type="text" class="input-field" name="deskripsi_barang" id="deskripsi_barang_field">
        </div>

        <div class="input-container">
            <div class="subtitle">Pengiriman barang menggunakan?</div>
            <div class="dropdown">
                <input type="text" class="input-field" name="pengiriman_barang" id="pengiriman_barang_field" readonly>
                <img src="{{ asset('image/general/drop.png') }}" class="arrow" id="dropdown_arrow" alt="Dropdown Arrow">
                <div class="dropdown-content" id="dropdown_content">
                    <div class="dropdown-item" onclick="selectOption('Antar sendiri')">Antar sendiri</div>
                    <div class="dropdown-item" onclick="selectOption('Menggunakan jasa pengiriman (Gosend/Grab Express/Lalamove/dll..)')">Menggunakan jasa pengiriman (Gosend/Grab Express/Lalamove/dll..)</div>
                    <div class="dropdown-item" onclick="selectOption('Menggunakan jasa pickup panti sosial')">Menggunakan jasa pickup panti sosial</div>
                </div>
            </div>
        </div>

        <div class="input-container">
            <div class="subtitle">Deskripsi Barang Donasi</div>
            <div class="text-instruction">
                Silahkan tentukan jam dan tanggal pengiriman donasi Anda
            </div>
        </div>


        <div class="input-container">
            <div class="subtitle">Jam Operasional {{ $kegiatanDonasi->PantiSosial->NamaPantiSosial }}</div>
            <div class="text-instruction">
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



        <div class="time-date-container">
            <div class="date-picker-container">
                <img src="{{ asset('image/general/calendar.png') }}" alt="Calendar Icon" class="icon">
                <input type="text" id="date-picker" class="input-field" name="tanggal_kegiatan">
            </div>

            <div class="time-picker-container">
                <img src="{{ asset('image/general/time.png') }}" alt="Time Icon" class="icon">
                <input type="text" class="input-field" name="jam_mulai_kegiatan" id="jam_mulai_kegiatan">
                <span style="padding-bottom: 10px; padding-left: 15px;  padding-right: 15px;"> - </span>
                <input type="text" class="input-field" name="jam_selesai_kegiatan" id="jam_selesai_kegiatan">
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
            <input type="hidden" name="IDKegiatanRelawan" value="{{ $kegiatanDonasi->IDKegiatanDonasi }}">
            <input type="hidden" name="IDDonaturRelawan" value="{{ $donaturRelawan->IDDonaturRelawan }}">
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#date-picker", {
            dateFormat: "Y-m-d",
        });

        flatpickr('#jam_mulai_kegiatan', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });


        flatpickr('#jam_selesai_kegiatan', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        function submitForm() {
            document.getElementById('nama_relawan').value = document.getElementById('nama_relawan_field').value;
            document.getElementById('no_hp_relawan').value = document.getElementById('no_hp_relawan_field').value;
            document.getElementById('alasan_relawan').value = document.getElementById('alasan_relawan_field').value;
            document.getElementById('tanggal_kegiatan').value = document.getElementById('date-picker').value;

            document.getElementById('submit-form').submit();
        }

        document.getElementById('pengiriman_barang_field').addEventListener('click', toggleDropdown);
document.getElementById('dropdown_arrow').addEventListener('click', toggleDropdown);

function toggleDropdown() {
    let dropdown = document.getElementById('dropdown_content');
    let arrow = document.getElementById('dropdown_arrow');
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
    } else {
        dropdown.style.display = "block";
        arrow.style.transform = "rotate(180deg)";
    }
}

function selectOption(value) {
    document.getElementById('pengiriman_barang_field').value = value;
    document.getElementById('dropdown_content').style.display = "none";
    document.getElementById('dropdown_arrow').style.transform = "rotate(0deg)";
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.input-field') && !event.target.matches('.arrow')) {
        let dropdown = document.getElementById('dropdown_content');
        let arrow = document.getElementById('dropdown_arrow');
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
            arrow.style.transform = "rotate(0deg)";
        }
    }
}


function selectOption(option) {
    // Membuat div baru untuk menampilkan opsi yang dipilih beserta tombol close
    var selectedDiv = document.createElement("div");
    selectedDiv.className = "selected-item";
    selectedDiv.innerHTML = option + '<img src="{{ asset('image/general/close.png') }}" class="close-btn" alt="Close Icon" onclick="removeOption(this)">';

    // Menambahkan div baru ke dalam div untuk menampilkan opsi yang dipilih
    document.getElementById('selected-options').appendChild(selectedDiv);

    // Menambahkan opsi yang dipilih ke input field
    var currentOption = document.getElementById('jenis_donasi_field').value;
    if (currentOption.length > 0) {
        document.getElementById('jenis_donasi_field').value += ', ' + option;
    } else {
        document.getElementById('jenis_donasi_field').value = option;
    }
}

function removeOption(element) {
    // Menghapus div yang berisi opsi yang dipilih
    var selectedDiv = element.parentNode;
    selectedDiv.parentNode.removeChild(selectedDiv);

    // Menghapus opsi yang dipilih dari input field
    var optionToRemove = element.parentNode.textContent.trim();
    var currentOptions = document.getElementById('jenis_donasi_field').value.split(', ');
    var updatedOptions = currentOptions.filter(function(option) {
        return option !== optionToRemove;
    });
    document.getElementById('jenis_donasi_field').value = updatedOptions.join(', ');
}


    </script>
</body>
</html>
