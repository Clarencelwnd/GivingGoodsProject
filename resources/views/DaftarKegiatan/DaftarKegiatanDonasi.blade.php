@extends('GeneralPageDonaturRelawan/templateDonaturRelawan')

@section('title', 'Formulir Daftar Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></link>
    <link href="{{ asset('css/DaftarKegiatan/daftarKegiatanDonasi.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('js/Artikel/DaftarKegiatanDonasi.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('content')
    <div class="containerDaftarDonasi">
        <div class="title">
            <a href="javascript:history.back()">
                <img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="40px"></a>
            <h1 id="judulKegiatan">Daftar Kegiatan</h1>
        </div>

        <div class="input-container">
            <div class="subtitle">Nama Donatur</div>
            <input type="text" class="input-field" name="nama_donatur" id="nama_donatur_field" value="{{ $donaturRelawan->NamaDonaturRelawan }}" readonly style="background-color: #f0f0f0;">
        </div>

        <div class="input-container">
            <div class="subtitle">No HP Donatur</div>
            <input type="text" class="input-field" name="no_hp_donatur" id="no_hp_donatur_field" value="{{ $donaturRelawan->NomorTeleponDonaturRelawan }}" readonly style="background-color: #f0f0f0;">
        </div>

        <div class="input-container">
            <div class="subtitle">Jenis Donasi</div>
            <div class="dropdown">
                <div id="selected-options"></div>
                <input type="text" class="input-field" name="jenis_donasi" id="jenis_donasi_field" value="{{ old('jenis_donasi') }}" readonly style="background-color: #f0f0f0;">
                <img src="{{ asset('image/general/drop.png') }}" class="arrow" id="dropdown_arrow_jenis" alt="Dropdown Arrow" style="margin-top:10px">
                <div class="dropdown-content" id="dropdown_content_jenis">
                    @foreach ($donasi as $item)
                    <div class="dropdown-item" onclick="selectOptionJenis('{{ $item }}')"><span>{{ $item }}</span></div>
                    @endforeach
                </div>
            </div>
            @if ($errors->has('jenis_donasi'))
                <div class="error-message">{{ $errors->first('jenis_donasi') }}</div>
            @endif
        </div>

        <div class="input-container">
            <div class="subtitle">Deskripsi Barang Donasi</div>
            <input type="text" class="input-field" name="deskripsi_barang" id="deskripsi_barang_field" value="{{ old('deskripsi_barang') }}" style="background-color: #f0f0f0;">
            @if ($errors->has('deskripsi_barang'))
                <div class="error-message">{{ $errors->first('deskripsi_barang') }}</div>
            @endif
        </div>

        <div class="input-container">
            <div class="subtitle">Pengiriman barang menggunakan?</div>
            <div class="dropdown">
                <input type="text" class="input-field" name="pengiriman_barang" id="pengiriman_barang_field" value="{{ old('pengiriman_barang') }}" readonly style="background-color: #f0f0f0;">
                <img src="{{ asset('image/general/drop.png') }}" class="arrow" id="dropdown_arrow" alt="Dropdown Arrow">
                <div class="dropdown-content" id="dropdown_content">
                    <div class="dropdown-item" onclick="selectOption('Antar sendiri')">Antar sendiri</div>
                    <div class="dropdown-item" onclick="selectOption('Menggunakan jasa pengiriman (Gosend/Grab Express/Lalamove/dll..)')">Menggunakan jasa pengiriman (Gosend/Grab Express/Lalamove/dll..)</div>
                    @if ($kegiatanDonasi->JasaPickup === 'Ya, kami memiliki jasa pickup')
                        <div class="dropdown-item" onclick="selectOption('Menggunakan jasa pickup panti sosial')">Menggunakan jasa pickup panti sosial</div>
                    @endif
                </div>
            </div>
            @if ($errors->has('pengiriman_barang'))
                <div class="error-message">{{ $errors->first('pengiriman_barang') }}</div>
            @endif
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
                            @if ($jadwal->JamBukaPantiSosial == '00:00:00' && $jadwal->JamTutupPantiSosial == '00:00:00')
                                {{ $jadwal->JamBukaPantiSosial }} - {{ $jadwal->JamTutupPantiSosial }} ( Libur )
                            @else
                                {{ $jadwal->JamBukaPantiSosial }} - {{ $jadwal->JamTutupPantiSosial }}
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="time-date-container">
            <div class="input-container">
                <div class="date-picker-container">
                    <img src="{{ asset('image/general/calendar.png') }}" alt="Calendar Icon" class="icon">
                    <input type="text" id="date-picker" class="input-field-date-time" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" style="background-color: #f0f0f0;">
                </div>
                @if ($errors->has('tanggal_kegiatan'))
                    <div class="error-message">{{ $errors->first('tanggal_kegiatan') }}</div>
                @endif
            </div>

            <div class="input-container">
                <div class="time-picker-container">
                    <img src="{{ asset('image/general/time.png') }}" alt="Time Icon" class="icon">
                    <input type="text" class="input-field-date-time" name="jam_mulai_kegiatan" id="jam_mulai_kegiatan_field" value="{{ old('jam_mulai_kegiatan') }}" style="background-color: #f0f0f0;">
                </div>
                @if ($errors->has('jam_mulai_kegiatan'))
                    <div class="error-message">{{ $errors->first('jam_mulai_kegiatan') }}</div>
                @endif
            </div>

        </div>

        <a href="#" class="button" onclick="event.preventDefault(); submitForm()">Lanjut</a>

        <!-- Form Hidden Fields -->
        <form id="submit-form" action="{{ route('storeDaftarKegiatanDonasi') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="nama_donatur" id="nama_donatur">
            <input type="hidden" name="no_hp_donatur" id="no_hp_donatur">
            <input type="hidden" name="jenis_donasi" id="jenis_donasi">
            <input type="hidden" name="deskripsi_barang" id="deskripsi_barang">
            <input type="hidden" name="pengiriman_barang" id="pengiriman_barang">
            <input type="hidden" name="tanggal_kegiatan" id="tanggal_kegiatan">
            <input type="hidden" name="jam_mulai_kegiatan" id="jam_mulai_kegiatan">
            <input type="hidden" name="IDKegiatanDonasi" value="{{ $kegiatanDonasi->IDKegiatanDonasi }}">
            <input type="hidden" name="IDDonaturRelawan" value="{{ $donaturRelawan->IDDonaturRelawan }}">
        </form>

    </div>

    <script>
        var tanggalMulaiKegiatanDonasi = "{{ $kegiatanDonasi->TanggalKegiatanDonasiMulai }}"
        var tanggalSelesaiKegiatanDonasi = "{{ $kegiatanDonasi->TanggalKegiatanDonasiSelesai }}"
        flatpickr("#date-picker", {
            dateFormat: "Y-m-d",
            minDate: tanggalMulaiKegiatanDonasi,
            maxDate: tanggalSelesaiKegiatanDonasi
        });

        flatpickr('#jam_mulai_kegiatan_field', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        function submitForm() {

            document.getElementById('nama_donatur').value = document.getElementById('nama_donatur_field').value;
            document.getElementById('no_hp_donatur').value = document.getElementById('no_hp_donatur_field').value;
            document.getElementById('jenis_donasi').value = document.getElementById('jenis_donasi_field').value;
            document.getElementById('deskripsi_barang').value = document.getElementById('deskripsi_barang_field').value;
            document.getElementById('pengiriman_barang').value = document.getElementById('pengiriman_barang_field').value;
            document.getElementById('tanggal_kegiatan').value = document.getElementById('date-picker').value;
            document.getElementById('jam_mulai_kegiatan').value = document.getElementById('jam_mulai_kegiatan_field').value;

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

                // Disable jam_mulai_kegiatan_field if 'Menggunakan jasa pickup panti sosial' is selected
                let jamMulaiKegiatanField = document.getElementById('jam_mulai_kegiatan_field');
                if (value === 'Menggunakan jasa pickup panti sosial') {
                    jamMulaiKegiatanField.disabled = true;
                    jamMulaiKegiatanField.value = '';  // Clear the value
                } else {
                    jamMulaiKegiatanField.disabled = false;
                }
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

            document.getElementById('jenis_donasi_field').addEventListener('click', toggleDropdownJenis);
            document.getElementById('dropdown_arrow_jenis').addEventListener('click', toggleDropdownJenis);

            function toggleDropdownJenis() {
                let dropdown = document.getElementById('dropdown_content_jenis');
                let arrow = document.getElementById('dropdown_arrow_jenis');
                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                    arrow.style.transform = "rotate(0deg)";
                } else {
                    dropdown.style.display = "block";
                    arrow.style.transform = "rotate(180deg)";
                }
            }

            window.onclick = function(event) {
                if (!event.target.matches('.input-field') && !event.target.matches('.arrow')) {
                    let dropdown = document.getElementById('dropdown_content_jenis');
                    let arrow = document.getElementById('dropdown_arrow_jenis');
                    if (dropdown.style.display === "block") {
                        dropdown.style.display = "none";
                        arrow.style.transform = "rotate(0deg)";
                    }
                }
            }

            function selectOptionJenis(option) {
                // Periksa apakah opsi sudah ada di selected-options
                var currentOptions = document.getElementById('jenis_donasi_field').value.split(', ');
                if (currentOptions.includes(option) && document.getElementById('jenis_donasi_field').value !== "") {
                    return; // Jika opsi sudah ada, hentikan fungsi
                }

                // Membuat div baru untuk menampilkan opsi yang dipilih beserta tombol close
                var selectedDiv = document.createElement("div");
                selectedDiv.className = "selected-item";
                selectedDiv.innerHTML = option + '<img src="{{ asset('image/general/close.png') }}" class="close-btn" alt="Close Icon" style="padding-left: 10px;" onclick="removeOption(this)">';

                // Menambahkan div baru ke dalam div untuk menampilkan opsi yang dipilih
                document.getElementById('selected-options').appendChild(selectedDiv);

                // Menambahkan opsi yang dipilih ke input field
                var currentOption = document.getElementById('jenis_donasi_field').value;
                if (currentOption.length > 0) {
                    document.getElementById('jenis_donasi_field').value += ',' + option.toLowerCase();
                } else {
                    document.getElementById('jenis_donasi_field').value = option.toLowerCase();
                }

                adjustArrowPadding();
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

                adjustArrowPadding();
            }

            // Fungsi untuk menyesuaikan padding atas arrow
            function adjustArrowPadding() {
                let selectedOptions = document.getElementById('selected-options');
                let arrow = document.getElementById('dropdown_arrow_jenis');
                if (selectedOptions.children.length > 0) {
                    // Jika ada opsi yang dipilih, tambahkan padding atas pada arrow
                    arrow.style.marginTop = '35px';
                } else {
                    // Jika tidak ada opsi yang dipilih, hapus padding atas pada arrow
                    arrow.style.marginTop = '0';
                }
            }
    </script>

@endsection
