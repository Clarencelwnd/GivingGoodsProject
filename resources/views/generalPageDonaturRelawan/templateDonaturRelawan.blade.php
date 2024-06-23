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

    <title>@yield('title')</title>
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('css/GeneralPageDonaturRelawan/templatePage.css') }}">
        <script src="{{ asset('js/GeneralPageDonaturRelawan/templatePage.js') }}"></script>
    @show


</head>

<body>
    @include('componentsUser/header', ['id' => $id])
    <hr>

    @section('header')
    <div id="main">
        @yield('content')
        @yield('pagination')
    </div>

</body>

</html>
