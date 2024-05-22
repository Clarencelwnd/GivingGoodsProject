<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .badge-custom {
            font-family: 'Plus Jakarta Sans', sans-serif;
            width: auto;
            height: 100%;
            padding: 3px 25px;
            border-radius: 5px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 25px;
        }

         .statusAkanDatang {
            background: #898989;
            color: white;
        }

        .statusSedangBerlangsung {
            background: #F3A229;
            color: white;
        }

        .statusSelesai {
            background: #16B364;
            color: white;
        }

    </style>
</head>
<body>

    {{-- AKAN DATANG --}}
    <x-statusKegiatan :statusClass="$statusClass" :statusText="$statusText" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

