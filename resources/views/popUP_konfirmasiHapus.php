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
    #popup-container-email-exists {
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
    padding: 15px;
    border-radius: 4px;
    width: 25%;
    text-align: center;
}
</style>


<div id="popup-container-email-exists" style="display: block;">
                        <!-- Popup untuk email sudah terdaftar -->
                        <div id="popup">
                            <h3 style="color: #1C3F5B; font-size: 24px; font-weight: 700;">Hapus Kegiatan</h3>
                            <p style="margin-top: 10px;">Apakah Anda yakin ingin menghapus kegiatan ini? Tindakan ini tidak dapat dibatalkan</p>
                            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                                <button class="btn-secondary" style="background-color: #FFFFFF; color: #007C92; font-weight: 600; font-size: 16px; margin-right: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Ubah</button>
                                <button class="btn-primary" style="background-color: #00AF71; color: #FFFFFF; font-weight: 600; font-size: 16px; margin-left: 10px;" onclick="window.location.href='{{ route('') }}'; return false;">Ya, Masuk</button>
                            </div>
                        </div>
                    </div>
</body>
</html>
