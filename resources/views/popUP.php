<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
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

</style>

                <!-- POP UP KONFIRMASI HAPUS PERUBAHAN  -->
                <!-- <div id="popup-container" style="display: block;">
                        <div id="popup">
                            <h3 style="color: #152F44; font-size: 24px; font-weight: 700;">Hapus Kegiatan</h3>
                            <p style="margin-top: 10px; font-size: 20px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menghapus kegiatan ini? Tindakan ini tidak dapat dibatalkan</p>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Batal</button>
                                <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Ya, Hapus</button>
                            </div>
                        </div>
                </div> -->

                <!-- POP UP KONFIRMASI SIMPAN PERUBAHAN  -->
                <!-- <div id="popup-container" style="display: block;">
                        <div id="popup">
                            <h3 style="color: #152F44; font-size: 24px; font-weight: 700;">Konfirmasi Penyimpanan Perubahan</h3>
                            <p style="margin-top: 10px; font-size: 20px; font-weight: 300; color: #152F44;">Apakah Anda yakin ingin menyimpan perubahan yang telah Anda buat? <br> Perrubahan yang disimpan akan menggantikan versi sebelumnya.</p>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Batal</button>
                                <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Ya, Simpan</button>
                            </div>
                        </div>
                </div> -->

                <!-- POP UP KELUAR DARI TAMPILAN HALAMAN  -->
                <!-- <div id="popup-container" style="display: block;">
                        <div id="popup">
                            <h3 style="color: #152F44; font-size: 24px; font-weight: 600;">Keluar dari Halaman ini?</h3>
                            <p style="margin-top: 10px; font-size: 20px; font-weight: 300; color: #152F44;">Kalau keluar sekarang, perubahan yang Anda buat<br> tidak akan tersimpan</p>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Keluar</button>
                                <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Lanjut Ubah</button>
                            </div>
                        </div>
                </div> -->


                <!-- POP UP KEGIATAN BERHASIL  -->
                <div id="popup-container" style="display: block;">
                            <!-- Popup untuk berhasil membuat akun -->
                            <div id="popup">
                                <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Kegiatan Berhasil Dibuat</h3>
                                <img src="{{ asset('image/general/􀁣.png') }}" alt="Icon" style="margin-top: 20px; height:70px; transform: rotate(90deg);">
                            </div>
                        </div>



</body>
</html>
