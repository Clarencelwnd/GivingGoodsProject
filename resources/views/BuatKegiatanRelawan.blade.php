<!-- resources/views/kegiatan-donasi/show.blade.php -->
@extends('templatePage')
@section('title', 'Buat Kegiatan Relawan')

@section('stylesheets')
    @parent
    <link rel="stylesheet" href="{{ asset('css/generalPage.css') }}">
    <script src="{{ asset('js/generalPage.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/BuatKegiatanRelawan.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="main-content">
        <div class="header">
            <div class="title">
                <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
                <h1>Buat Kegiatan Relawan</h1>
            </div>

        </div>

        <form action="{{ route('buat_kegiatan_relawan.store') }}" method="POST" enctype="multipart/form-data">
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
                        <span id="fileName" style="margin-left: 10px;"></span>
                        <!-- Input hidden untuk menyimpan URL gambar -->
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
                    <div class="detail-label">Jenis Relawan</div>
                    <div class="detail-input-container">
                        <div class="detail-info">
                            <div class="dropdown" onclick="toggleDropdown()">
                                <div class="dropdown-select">
                                    <span id="dropdown-selected">{{ old('jenisRelawan', '') }}</span>
                                    <img id="dropdown-arrow" src="{{ asset('image/general/drop.png') }}" alt="Arrow" width="20px">
                                </div>
                                <div class="dropdown-menu">
                                    <div class="dropdown-item" onclick="selectOption('Bencana Alam')">Bencana Alam</div>
                                    <div class="dropdown-item" onclick="selectOption('Pendidikan')">Pendidikan</div>
                                    <div class="dropdown-item" onclick="selectOption('Kesehatan')">Kesehatan</div>
                                    <div class="dropdown-item" onclick="selectOption('Lingkungan Hidup')">Lingkungan Hidup</div>
                                    <div class="dropdown-item" onclick="selectOption('IT dan teknologi')">IT dan teknologi</div>
                                    <div class="dropdown-item" onclick="selectOption('Pengembangan Masyarakat')">Pengembangan Masyarakat</div>
                                    <div class="dropdown-item" onclick="selectOption('Darurat dan Bencana')">Darurat dan Bencana</div>
                                    <div class="dropdown-item" onclick="selectOption('Seni dan Budaya')">Seni dan Budaya</div>
                                </div>
                            </div>
                            <input type="hidden" name="jenisRelawan" id="jenisRelawanInput" value="{{ old('jenisRelawan') }}">
                        </div>
                        @error('jenisRelawan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="detail-row">
                    <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                    <div class="detail-input-container">
                        <div class="detail-dates">
                            <div class="detail-info-tanggal" id="tglMulai" contenteditable="true" data-old="{{ old('tglMulai', '') }}" oninput="updateHiddenInput('tglMulaiInput', this.innerText)">
                                {{ old('tglMulai', '') }}
                            </div>
                            <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                            <div class="detail-info-tanggal" id="tglSelesai" contenteditable="true" data-old="{{ old('tglSelesai', '') }}" oninput="updateHiddenInput('tglSelesaiInput', this.innerText)">
                                {{ old('tglSelesai', '') }}
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
                    <div class="detail-label">Pendaftaran ditutup</div>
                    <div class="detail-input-container">
                        <div class="detail-dates">
                            <div class="detail-info-tanggal-tutup" id="pendaftaranTutup" contenteditable="true" data-old="{{ old('pendaftaranTutup', '') }}" oninput="updateHiddenInput('pendaftaranTutupInput', this.innerText)">
                                {{ old('pendaftaranTutup', '') }}
                            </div>
                            <input type="hidden" name="pendaftaranTutup" id="pendaftaranTutupInput" value="{{ old('pendaftaranTutup') }}">
                        </div>
                        @error('pendaftaranTutup')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Jumlah Relawan yang Dibutuhkan</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('jmlhRelawanDibutuhkan', '') }}" oninput="updateHiddenInput('jmlhRelawanDibutuhkanInput', this.innerText)">
                            {{ old('jmlhRelawanDibutuhkan', '') }}
                        </div>
                        <input type="hidden" name="jmlhRelawanDibutuhkan" id="jmlhRelawanDibutuhkanInput" value="{{ old('jmlhRelawanDibutuhkan') }}">
                        @error('jmlhRelawanDibutuhkan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
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
                        <div class="hint-text">maks. 200 kata</div>
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
                    <div class="detail-label">Jam Kegiatan</div>
                    <div class="detail-input-container">
                        <div class="detail-dates">
                            <div class="detail-info-jam" id="jamMulai" contenteditable="true" data-old="{{ old('jamMulai', '') }}" oninput="updateHiddenInput('jamMulaiInput', this.innerText)">
                                {{ old('jamMulai', '') }}
                            </div>
                            <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                            <div class="detail-info-jam" id="jamSelesai" contenteditable="true" data-old="{{ old('jamSelesai', '') }}" oninput="updateHiddenInput('jamSelesaiInput', this.innerText)">
                                {{ old('jamSelesai', '') }}
                            </div>
                            <input type="hidden" name="jamMulai" id="jamMulaiInput" value="{{ old('jamMulai') }}">
                            <input type="hidden" name="jamSelesai" id="jamSelesaiInput" value="{{ old('jamSelesai') }}">
                        </div>
                        @if ($errors->has('jamMulai') || $errors->has('jamSelesai'))
                            <div class="error-message">{{ $errors->first('jamMulai') ?: $errors->first('jamSelesai') }}</div>
                        @enderror
                    </div>
                </div>


                <div class="detail-row">
                    <div class="detail-label">Kriteria Relawan</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('kriteriaRelawan', '') }}" oninput="updateHiddenInput('kriteriaRelawanInput', this.innerText)">
                            {{ old('kriteriaRelawan', '') }}
                        </div>
                        <input type="hidden" name="kriteriaRelawan" id="kriteriaRelawanInput" value="{{ old('kriteriaRelawan') }}">
                        @error('kriteriaRelawan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="hint-text">maks. 200 kata</div>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Persyaratan & Instruksi <br> untuk mengikuti Kegiatan</div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('persyaratan', '') }}" oninput="updateHiddenInput('persyaratanInput', this.innerText)">
                            {{ old('persyaratan', '') }}
                        </div>
                        <input type="hidden" name="persyaratan" id="persyaratanInput" value="{{ old('persyaratan') }}">
                        @error('persyaratan')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                        <div class="hint-text">maks. 200 kata</div>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Kontak Spesifik <br> <span class="optional-text">(opsional)</span></div>
                    <div class="detail-input-container">
                        <div class="detail-info" contenteditable="true" data-old="{{ old('kontakSpesifik', '') }}" oninput="updateHiddenInput('kontakSpesifikInput', this.innerText)">
                            {{ old('kontakSpesifik', '') }}
                        </div>
                        <input type="hidden" name="kontakSpesifik" id="kontakSpesifikInput" value="{{ old('kontakSpesifik') }}">
                        @error('kontakSpesifik')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="button-container">
                    <button class="cancel-btn" type="button" onclick="window.location='{{ url("/") }}'">Batal</button>
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


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>

function updateHiddenInput(inputId, value) {
            document.getElementById(inputId).value = value;
        }


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


                    flatpickr("#pendaftaranTutup", {
                        dateFormat: "Y-m-d",
                        onChange: function(selectedDates, dateStr, instance) {
                            document.getElementById('pendaftaranTutup').textContent = dateStr;
                            document.getElementById('pendaftaranTutup').setAttribute('contenteditable', 'false');
                        }
                    });
                });


                document.addEventListener('DOMContentLoaded', function() {
                        flatpickr("#jamMulai", {
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: "H:i",
                            time_24hr: true,
                            onChange: function(selectedDates, dateStr, instance) {
                                document.getElementById('jamMulai').textContent = dateStr;
                                updateHiddenInput('jamMulaiInput', dateStr);
                            }
                        });

                        flatpickr("#jamSelesai", {
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: "H:i",
                            time_24hr: true,
                            onChange: function(selectedDates, dateStr, instance) {
                                document.getElementById('jamSelesai').textContent = dateStr;
                                updateHiddenInput('jamSelesaiInput', dateStr);
                            }
                        });
                    });


                function hideDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'none';
                }



                function toggleDropdown() {
                    document.querySelector('.dropdown').classList.toggle('dropdown-open');
                }

                function selectOption(option) {
                    document.getElementById('dropdown-selected').innerText = option;
                    document.getElementById('jenisRelawanInput').value = option;
                    updateHiddenInput('jenisRelawanInput', option); // Memperbarui input hidden
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

        function showInfoMessage(imgElement) {
            const infoMessage = document.getElementById('infoMessage');
            if (infoMessage.style.display === 'block') {
                infoMessage.style.display = 'none';
            } else {
                infoMessage.style.display = 'block';

                // Posisi pesan dekat dengan gambar yang diklik
                const rect = imgElement.getBoundingClientRect();
                infoMessage.style.position = 'absolute';
                infoMessage.style.left = `${rect.right + 10}px`;
                infoMessage.style.top = `${rect.top}px`;

                // Tambahkan event listener untuk klik di luar pesan
                document.addEventListener('click', function(event) {
                    if (!infoMessage.contains(event.target) && !imgElement.contains(event.target)) {
                        infoMessage.style.display = 'none';
                    }
                });
            }
        }

        </script>
@endsection

