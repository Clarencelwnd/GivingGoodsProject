@extends('GeneralPagePantiSosial.templatePage')
@section('title', 'Buat Kegiatan Donasi')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/generalPage.css')}}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/KegiatanDonasiPantiSosial/BuatKegiatanDonasi.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('content')
<div class="main-content">
        <div class="header">
            <div class="title">
                <a href="{{ route('viewAllKegiatan', ['id' => $pantiSosial->IDPantiSosial]) }}"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="30px" width="30px"></a>
                <h1 id="judul-kegiatan-donasi">Buat Kegiatan Donasi</h1>
            </div>

        </div>
        <form action="{{ route('buat_kegiatan_donasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="IDPantiSosial" value="{{ $pantiSosial->IDPantiSosial }}">
            <div class="details">
                <!-- Bagian Detail Info yang bisa diubah -->
                <div class="detail-row">
                    <div class="detail-label">Nama Kegiatan</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('namaKegiatan', '') }}" oninput="updateHiddenInput('namaKegiatanInput', this.innerText)">
                            {{ old('namaKegiatan', '') }}
                        </div>
                        <input type="hidden" name="namaKegiatan" id="namaKegiatanInput" value="{{ old('namaKegiatan') }}">
                        @error('namaKegiatan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="hint-text">maks. 5 kata</div>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Foto-foto Kegiatan</div>
                    <div class="detail-input-container">
                            <label for="fotoKegiatanUpload" class="upload-btn" style="background-color: #007C92; border-radius:5px; color: white; font-size: 20px; padding: 10px 20px; cursor: pointer;">
                                Upload
                            </label>
                            <input type="file" name="fotoKegiatan" id="fotoKegiatanUpload" style="display: none;" onchange="showFileName()">
                            <span id="fileName" style="margin-left: 10px;">{{ old('fotoKegiatan') }}</span>
                            <input type="hidden" name="urlFotoKegiatan" id="urlFotoKegiatanInput" value="{{ old('urlFotoKegiatan') }}">
                        @error('fotoKegiatan')
                            <div class="error-message-upload">{{ $message }}</div>
                        @enderror
                        <div style="padding-top: 10px;" class="hint-text">maks. 1 foto</div>
                    </div>
                </div>


                <div class="detail-row">
                    <div class="detail-label">Deskripsi Kegiatan</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('deskripsiKegiatan', '') }}" oninput="updateHiddenInput('deskripsiKegiatanInput', this.innerText)">
                            {{ old('deskripsiKegiatan', '') }}
                        </div>
                        <input type="hidden" name="deskripsiKegiatan" id="deskripsiKegiatanInput" value="{{ old('deskripsiKegiatan') }}">
                        @error('deskripsiKegiatan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="hint-text">maks. 200 kata</div>
                    </div>
                </div>


                <div class="detail-row">
                    <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                    <div class="detail-input-container">
                        <div class="detail-dates">
                            <div class="detail-info-tanggal" id="tglMulai" contenteditable="true" oninput="updateHiddenInput('tglMulaiInput', this.innerText)">
                                {{ old('tglMulai') }}
                            </div>
                            <img src="{{ asset('image/general/line.png') }}" alt="Line" width="10px">
                            <div class="detail-info-tanggal" id="tglSelesai" contenteditable="true" oninput="updateHiddenInput('tglSelesaiInput', this.innerText)">
                                {{ old('tglSelesai') }}
                            </div>
                            <input type="hidden" name="tglMulai" id="tglMulaiInput" value="{{ old('tglMulai') }}">
                            <input type="hidden" name="tglSelesai" id="tglSelesaiInput" value="{{ old('tglSelesai') }}">
                        </div>
                        @if ($errors->has('tglMulai') || $errors->has('tglSelesai'))
                            <div class="error-message">{{ $errors->first('tglMulai') ?: $errors->first('tglSelesai') }}</div>
                        @endif
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Jenis Donasi
                        <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
                    </div>

                    <div class="detail-info-jenis d-flex justify-content-start">
                        <div class="donation-options">
                            @php
                                $allDonasiTypes = [
                                    'pakaian', 'makanan', 'obat', 'buku', 'keperluan_ibadah',
                                    'mainan', 'keperluan_mandi', 'keperluan_rumah', 'alat_tulis', 'sepatu'
                                ];
                                $jenisDonasiArray = explode(',', old('jenisDonasi', ''));
                            @endphp
                            @foreach($allDonasiTypes as $jenisDonasi)
                                @php
                                    $namaFile = 'image/donasi/' . strtolower(trim($jenisDonasi)) . '.png';
                                    $selected = in_array($jenisDonasi, $jenisDonasiArray);
                                @endphp
                                <div class="donation-icon-wrapper {{ $selected ? 'selected' : '' }}" onclick="toggleDonasi(this, '{{ $jenisDonasi }}')">
                                    <img src="{{ asset($namaFile) }}" alt="{{ $jenisDonasi }}" height="20px">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="jenisDonasi" id="jenisDonasiInput" value="{{ old('jenisDonasi', '') }}">
                </div>


                <div class="detail-row">
                    <div class="detail-label">Deskripsi Jenis Donasi</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('deskripsiJenisDonasiInput', this.innerText)">{{ old('deskripsiJenisDonasi') }}</div>
                        <input type="hidden" name="deskripsiJenisDonasi" id="deskripsiJenisDonasiInput" value="{{ old('deskripsiJenisDonasi') }}">
                        @if ($errors->has('deskripsiJenisDonasi'))
                            <div class="error-message">{{ $errors->first('deskripsiJenisDonasi') }}</div>
                        @endif
                        <div class="hint-text">maks. 200 kata</div>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('lokasiKegiatan', '') }}" oninput="updateHiddenInput('lokasiKegiatanInput', this.innerText)">
                            {{ old('lokasiKegiatan', '') }}
                        </div>
                        <input type="hidden" name="lokasiKegiatan" id="lokasiKegiatanInput" value="{{ old('lokasiKegiatan') }}">
                        @error('lokasiKegiatan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Lokasi pada Google Maps
                        <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showInfoMessage(this)">
                    </div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('linkGoogleMaps', '') }}" oninput="updateHiddenInput('linkGoogleMapsInput', this.innerText)">
                            {{ old('linkGoogleMaps', '') }}
                        </div>
                        <input type="hidden" name="linkGoogleMaps" id="linkGoogleMapsInput" value="{{ old('linkGoogleMaps') }}">
                        @error('linkGoogleMaps')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div id="infoMessage">
                    Mohon mencari dan menyalin link <br> Google Maps untuk lokasi kegiatan donasi.
                </div>

                <div class="detail-row">
                    <div class="detail-label">Apakah Panti Sosial <br> menyediakan jasa ambil <br> barang?</div>
                    <div class="detail-input-container">
                        <div class="detail-info">
                            <div class="dropdownpickup" onclick="toggleDropdown()">
                                <div class="dropdown-select">
                                    <span id="dropdown-selected">{{ old('jasaAmbilBarang', '') }}</span>
                                    <img id="dropdown-arrow" src="{{ asset('image/general/drop.png') }}" alt="Arrow" width="20px">
                                </div>
                                <div class="dropdown-menu">
                                    <div class="dropdown-item" onclick="selectOption('Ya, kami memiliki jasa pick up')">Ya, kami memiliki jasa pick up</div>
                                    <div class="dropdown-item" onclick="selectOption('Tidak, kami tidak memiliki jasa pick up')">Tidak, kami tidak memiliki jasa pick up</div>
                                </div>
                            </div>
                            <input type="hidden" name="jasaAmbilBarang" id="jasaAmbilBarangInput" value="{{ old('jasaAmbilBarang') }}">
                        </div>
                        @if ($errors->has('jasaAmbilBarang'))
                            <div class= "error-message">{{ $errors->first('jasaAmbilBarang') }}</div>
                        @endif
                    </div>
                </div>

                <div class="button-container">
                    <button class="cancel-btn" type="button" onclick="window.location='{{ route('viewAllKegiatan', ['id'=>$id]) }}'">Batal</button>
                    <button class="save-btn" type="submit">Buat</button>
                </div>
            </div>
        </form>
    </div>

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popupContainer = document.getElementById('popup-container');
            popupContainer.style.display = 'block';

            setTimeout(() => {
                popupContainer.style.display = 'none';
            }, 2000);
        });
    </script>
    @endif

    <div id="popup-container" style="display: none;">
        <div id="popup">
            <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Kegiatan Berhasil Dibuat</h3>
            <img src="{{ asset('image/general/􀁣.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
        </div>
    </div>

    <div id="donation-popup-container" style="display: none;">
        <div id="donation-popup">
            <div class="popup-header">
                <h3>Jenis Donasi</h3>
                <img src="{{ asset('image/general/close.png') }}" alt="Close" class="close-icon" onclick="hideDonationPopup()" style="height: 20px">
            </div>
            <div class="popup-content">
                <div class="popup-column">
                    <!-- Left Column Items -->
                    <div class="popup-row"><img src="{{ asset('image/donasi/pakaian.png') }}" alt="Pakaian"><span>Pakaian</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/makanan.png') }}" alt="Makanan"><span>Makanan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/obat.png') }}" alt="Obat-obatan"><span>Obat-obatan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/buku.png') }}" alt="Buku-buku"><span>Buku-buku</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
                </div>
                <div class="popup-column">
                    <!-- Right Column Items -->
                    <div class="popup-row"><img src="{{ asset('image/donasi/mainan.png') }}" alt="Mainan"><span>Mainan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_mandi.png') }}" alt="Perlengkapan Mandi"><span>Perlengkapan Mandi</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_rumah.png') }}" alt="Keperluan Rumah"><span>Keperluan Rumah</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/alat_tulis.png') }}" alt="Alat Tulis"><span>Alat Tulis</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/sepatu.png') }}" alt="Sepatu"><span>Sepatu</span></div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tglMulai", {
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                document.getElementById('tglMulai').textContent = dateStr;
                document.getElementById('tglMulai').setAttribute('contenteditable', 'false');
            }
        });

        flatpickr("#tglSelesai", {
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                document.getElementById('tglSelesai').textContent = dateStr;
                document.getElementById('tglSelesai').setAttribute('contenteditable', 'false');
            }
        });
    });

    function toggleDonasi(element, jenisDonasi) {
        const jenisDonasiInput = document.getElementById('jenisDonasiInput');
        let selectedValues = jenisDonasiInput.value ? jenisDonasiInput.value.split(',') : [];

        if (element.classList.contains('selected')) {
            element.classList.remove('selected');
            selectedValues = selectedValues.filter(value => value !== jenisDonasi);
        } else {
            element.classList.add('selected');
            selectedValues.push(jenisDonasi);
        }

        jenisDonasiInput.value = selectedValues.join(',');
    }

    function showDonationPopup() {
        document.getElementById('donation-popup-container').style.display = 'flex';
    }

    function hideDonationPopup() {
        document.getElementById('donation-popup-container').style.display = 'none';
    }

    function toggleDropdown() {
        // document.querySelector('.dropdown').classList.toggle('dropdown-open');
        const dropdown = document.querySelector('.dropdownpickup');
        dropdown.classList.toggle('dropdown-open');
    }

    function showInfoMessage(imgElement) {
        const infoMessage = document.getElementById('infoMessage');
        if (infoMessage.style.display === 'block') {
            infoMessage.style.display = 'none';
        } else {
            infoMessage.style.display = 'block';

            // Posisi pesan dekat dengan gambar yang diklik
            const rect = imgElement.getBoundingClientRect();
            const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            infoMessage.style.position = 'absolute';
            infoMessage.style.left = `${rect.right + 10 + scrollLeft}px`;
            infoMessage.style.top = `${rect.top + scrollTop}px`;

            // Tambahkan event listener untuk klik di luar pesan
            document.addEventListener('click', function(event) {
                if (!infoMessage.contains(event.target) && !imgElement.contains(event.target)) {
                    infoMessage.style.display = 'none';
                }
            }, {once: true});
        }
    }

    function selectOption(option) {
        document.getElementById('dropdown-selected').innerText = option;
        document.getElementById('jasaAmbilBarangInput').value = option;
        updateHiddenInput('jasaAmbilBarangInput', option); // Memperbarui input hidden
        setTimeout(() => {
            document.querySelector('.dropdown').classList.remove('dropdown-open');
        }, 100); // Beri sedikit jeda sebelum menutup dropdown
    }

    document.addEventListener('click', function(event) {
        const dropdown = document.querySelector('.dropdown');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        if (!dropdown.contains(event.target) && dropdownMenu.style.display === 'block') {
            dropdown.classList.remove('dropdown-open');
        }
    });

    function updateHiddenInput(inputId, value) {
        document.getElementById(inputId).value = value;
    }

     // Fungsi untuk menampilkan nama file yang diunggah dan mengupdate nilai input hidden dengan URL gambar
    function showFileName() {
        const input = document.getElementById('fotoKegiatanUpload');
        const fileName = document.getElementById('fileName');
        const file = input.files[0];
        fileName.textContent = file.name;

        // Menggunakan URL.createObjectURL() untuk mendapatkan URL gambar dari file yang diunggah
        const imageURL = URL.createObjectURL(file);

        // Memperbarui nilai input hidden dengan URL gambar
        updateHiddenInput('urlFotoKegiatanInput', imageURL);
    }

    function selectDonationOption(selectedImg) {
        const jenisDonasiInput = document.getElementById('jenisDonasiInput');
        let selectedValues = jenisDonasiInput.value ? jenisDonasiInput.value.split(',') : [];

        if (selectedImg.classList.contains('selected')) {
            selectedImg.classList.remove('selected');
            selectedValues = selectedValues.filter(value => value !== selectedImg.alt);
        } else {
            selectedImg.classList.add('selected');
            selectedValues.push(selectedImg.alt);
        }

        jenisDonasiInput.value = selectedValues.join(',');
        updateHiddenInput('jenisDonasiInput', jenisDonasiInput.value);
    }
        </script>
@endsection

