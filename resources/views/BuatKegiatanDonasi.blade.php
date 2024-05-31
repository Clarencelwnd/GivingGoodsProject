<!-- resources/views/kegiatan-donasi/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kegiatan Donasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<style>
/* Style your page here */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.sidebar {
    width: 15%;
    background-color: #00849B;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.contact-info {
    margin-top: auto;
    margin-bottom: 40px
}

.sidebar img {
    width: 100px;
    margin-bottom: 20px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    margin-bottom: 10px;
}

.main-content {
    margin-left: 16.666%;
    padding: 80px;
}

.header {
    display: flex;
    align-items: flex-start;
    flex-direction: column;
    margin-bottom: 20px;
}

.header h1 {
    font-weight: 600;
    color: #007C92;
    font-size: 36px;
    margin-bottom: 10px;
}

.title {
    display: flex;
    align-items: center;
    flex-direction: row;
}

.title img {
    display: flex;
    padding-top: 10px;
    padding-right: 10px;
}

.buttons {
    margin-top: 10px;
    padding-bottom: 20px;
}

.buttons button {
    padding: 10px 20px;
    border: none;
    margin-left: 10px;
    color: white;
    cursor: pointer;
}

.edit-btn {
    background-color: #00AF71;
    border-radius: 5px;
    font-size: 18px;
}

.delete-btn {
    background-color: #B7342C;
    border-radius: 5px;
    font-size: 18px;
}

.details {
    margin-top: 30px;
}

.contact-info p {
    margin: 5px 0;
}

.donor-history {
    margin-top: 50px;
}

.view-history-btn {
    background-color: #00AF71;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 60px;
    cursor: pointer;
    font-size: 18px;
}
.detail-row {
    display: flex;
    margin-bottom: 10px;
    justify-content: flex-start;
    margin-bottom: 20px;
}

.detail-label {
    flex: 1;
    font-weight: 600;
    color: #006374;
    font-weight: bold;
    margin-bottom: 10px;
}

.detail-info {
    flex: 2;
    background-color: #D9D9D9;
    padding: 10px;
    border-radius: 5px;
}
.detail-dates {
    display: flex;
    align-items: center;
    padding-right: 432px;
}

.detail-info-tanggal {
    background-color: #D9D9D9;
    padding: 10px;
    margin: 0 5px;
    border-radius: 5px;
}

.date-separator {
    padding: 0 20px;
    font-weight: bold;s
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

.btn-primary, .btn-secondary {
    width: 36%;
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
    margin-right: 55px;
}
.btn-secondary {
    background-color: #FFFFFF;
    color: #007C92;
    border: 1px solid #007C92;
    margin-left: 55px;
}

.delete-button {
        width: 245px; /* Atur lebar sesuai kebutuhan */
    }




    #donation-popup-container {
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

#donation-popup {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    max-width: 600px;
    width: 80%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    margin-top: -25px;
}

.popup-header h3 {
    color: #1C3F5B;
    font-weight: 600;
    font-size: 32px;
}

.popup-header .close-icon {
    cursor: pointer;
}

.popup-content {
    display: flex;
    justify-content: space-between;
}

.popup-column {
    display: flex;
    flex-direction: column;
}

.popup-row {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}

.popup-row img {
    margin-right: 10px;
    height: 35px;
    width: 37px;
}

.popup-row span {
    color: #006374;
    font-weight: 400;
    font-size: 22px;
    padding-left: 20px;
}


.button-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 55px;
    }

    .save-btn {
        background-color: #00AF71;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        width: 20%;
    }

    .cancel-btn {
        color: #007C92;
        background-color: white;
        border: 2px solid #007C92;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        margin-right: 20px;
        width: 20%;
    }



    .dropdown-select {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    cursor: pointer;

}

.dropdown-select img {
    transition: transform 0.3s;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #fff;
    width: 47%;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    border: none;
}

.dropdown-item {
    padding: 10px;
    cursor: pointer;
}

.dropdown-item:hover {
    background-color: #f0f0f0;
}

.dropdown-open .dropdown-menu {
    display: block;
}

.dropdown-open .dropdown-select img {
    transform: rotate(180deg);
}



</style>
<body>
    <div class="sidebar">
        <img src="{{ asset('image/general/logo2.png') }}" alt="Logo">
        <a href="#">Kegiatan</a>
        <a href="#">Forum</a>
        <a href="#">FAQ</a>
        <div class="contact-info">
            <p>Hubungi Kami</p>
            <p>0812-1316-1234</p>
            <p>givinggoods@gmail.com</p>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="title">
                <a href="#"><img src="{{ asset('image/general/back.png') }}" alt="Back" class="back-btn" height="20px"></a>
                <h1>Buat Kegiatan Donasi</h1>
            </div>

        </div>
        <form action="{{ route('buat_kegiatan_donasi.store') }}" method="POST">
            @csrf
            <div class="details">
                <!-- Bagian Detail Info yang bisa diubah -->
                <div class="detail-row">
                    <div class="detail-label">Nama Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('namaKegiatanInput', this.innerText)"></div>
                    <input type="hidden" name="namaKegiatan" id="namaKegiatanInput" value="">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Foto-foto Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('fotoKegiatanInput', this.innerText)"></div>
                    <input type="hidden" name="fotoKegiatan" id="fotoKegiatanInput" value="">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Deskripsi Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('deskripsiKegiatanInput', this.innerText)"></div>
                    <input type="hidden" name="deskripsiKegiatan" id="deskripsiKegiatanInput" value="">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Tanggal Kegiatan Berlangsung</div>
                    <div class="detail-dates">
                        <div class="detail-info-tanggal" id="tglMulai" contenteditable="true" oninput="updateHiddenInput('tglMulaiInput', this.innerText)"></div>
                        <img src="{{ asset('image/general/line.png') }}" alt="Back" width="20px" style="padding-left: 15px; padding-right: 15px;">
                        <div class="detail-info-tanggal" id="tglSelesai" contenteditable="true" oninput="updateHiddenInput('tglSelesaiInput', this.innerText)"></div>
                        <input type="hidden" name="tglMulai" id="tglMulaiInput" value="">
                        <input type="hidden" name="tglSelesai" id="tglSelesaiInput" value="">
                    </div>
                </div>

                {{-- <div class="detail-row">
                    <div class="detail-label">Jenis Donasi
                        <img src="{{ asset('image/general/information.png') }}" alt="Info" class="donation-icon" height="12px" onclick="showDonationPopup()">
                    </div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('jenisDonasiInput', this.innerText)"></div>
                    <input type="hidden" name="jenisDonasi" id="jenisDonasiInput" value="">
                </div> --}}
                <div class="detail-row">
                    <div class="detail-label">Jenis Donasi</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('jenisDonasiInput', this.innerText)"></div>
                    <input type="hidden" name="jenisDonasi" id="jenisDonasiInput" value="">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Deskripsi Jenis Donasi</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('deskripsiJenisDonasiInput', this.innerText)"></div>
                    <input type="hidden" name="deskripsiJenisDonasi" id="deskripsiJenisDonasiInput" value="">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Lokasi Pelaksanaan Kegiatan</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('lokasiKegiatanInput', this.innerText)"></div>
                    <input type="hidden" name="lokasiKegiatan" id="lokasiKegiatanInput" value="">
                </div>

                <div class="detail-row">
                    <div class="detail-label">Lokasi pada Google Maps</div>
                    <div class="detail-info" contenteditable="true" oninput="updateHiddenInput('linkGoogleMapsInput', this.innerText)"></div>
                    <input type="hidden" name="linkGoogleMaps" id="linkGoogleMapsInput" value="">
                </div>

                {{-- <div class="detail-row">
                    <div class="detail-label">Apakah Panti Sosial <br> menyediakan jasa ambil <br> barang?</div>
                    <div class="detail-info">
                        <div class="dropdown" onclick="toggleDropdown()">
                            <div class="dropdown-select">
                                <span id="dropdown-selected">Pilih opsi</span>
                                <img id="dropdown-arrow" src="{{ asset('image/general/drop.png') }}" alt="Arrow" width="20px">
                            </div>
                            <div class="dropdown-menu">
                                <div class="dropdown-item" onclick="selectOption('Ya, kami memiliki jasa pick up')">Ya, kami memiliki jasa pick up</div>
                                <div class="dropdown-item" onclick="selectOption('Tidak, kami tidak memiliki jasa pick up')">Tidak, kami tidak memiliki jasa pick up</div>
                            </div>
                        </div>
                        <input type="hidden" name="jasaAmbilBarang" id="jasaAmbilBarangInput" value="">
                    </div>
                </div> --}}


                <div class="button-container">
                    <button class="cancel-btn" type="button" onclick="window.location='{{ url("/") }}'">Batal</button>
                    <button class="save-btn" type="submit">Buat</button>
                </div>
            </div>
        </form>


    </div>

    @if(session('success'))
<script>
    document.getElementById('popup-container').style.display = 'block';
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
                    <div class="popup-row"><img src="{{ asset('image/donasi/perlengkapan_ibadah.png') }}" alt="Keperluan Ibadah"><span>Keperluan Ibadah</span></div>
                </div>
                <div class="popup-column">
                    <!-- Right Column Items -->
                    <div class="popup-row"><img src="{{ asset('image/donasi/mainan.png') }}" alt="Mainan"><span>Mainan</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/toiletries.png') }}" alt="Perlengkapan Mandi"><span>Perlengkapan Mandi</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/keperluan_rumah.png') }}" alt="Keperluan Rumah"><span>Keperluan Rumah</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/alat_tulis.png') }}" alt="Alat Tulis"><span>Alat Tulis</span></div>
                    <div class="popup-row"><img src="{{ asset('image/donasi/sepatu.png') }}" alt="Sepatu"><span>Sepatu</span></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>

        document.addEventListener('DOMContentLoaded', function() {
                    flatpickr("#tglMulai", {
                        dateFormat: "Y-m-d",
                        onChange: function(selectedDates, dateStr, instance) {
                            document.getElementById('tglMulai').textContent = dateStr;
                        }
                    });

                    flatpickr("#tglSelesai", {
                        dateFormat: "Y-m-d",
                        onChange: function(selectedDates, dateStr, instance) {
                            document.getElementById('tglSelesai').textContent = dateStr;
                        }
                    });
                });


                function showDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'flex';
                }

                function hideDonationPopup() {
                    document.getElementById('donation-popup-container').style.display = 'none';
                }



                function toggleDropdown() {
                    document.querySelector('.dropdown').classList.toggle('dropdown-open');
                }

                function selectOption(option) {
                    document.getElementById('dropdown-selected').innerText = option;
                    document.getElementById('jasaAmbilBarangInput').value = option;
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

                function updateHiddenInput(inputId, text) {
    document.getElementById(inputId).value = text;
}



        </script>

</body>
</html>
