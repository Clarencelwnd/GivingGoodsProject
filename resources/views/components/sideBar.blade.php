<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        {{-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> --}}
        <a href="{{ route('viewAllKegiatan', ['id' => $id]) }}">Kegiatan</a>
        <a href="{{ route('displayDaftarForum', ['id' => $id]) }}">Forum</a>
        <a href="{{ route('faq', ['id' => $id]) }}">FAQ</a>
        <div class="contact-us">
            <p>Hubungi Kami:</p>
            <div id="content-contact-us">
                <p>0812-1234-1316</p>
                <p>givinggoods@gmail.com</p>
            </div>
        </div>
    </div>
</body>
</html>
