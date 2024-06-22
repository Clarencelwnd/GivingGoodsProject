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
<<<<<<<< HEAD:resources/views/generalPageDonaturRelawan/templateDonaturRelawan.blade.php
        <link rel="stylesheet" href="{{ asset('css/GeneralPageDonaturRelawan/templatePage.css') }}">
        <script src="{{ asset('js/GeneralPageDonaturRelawan/templatePage.js') }}"></script>
    @show


</head>

<body>
    @include('components/header', ['id' => $id])
    <hr>

    @section('header')
    <div id="main">
        @yield('content')
        @yield('pagination')
========
        <link rel="stylesheet" href="{{ asset('css/GeneralPagePantiSosial/templatePage.css') }}">
        <script src="{{ asset('js/templatePage.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @show
</head>

<body>
    <div class="container">
        @include('componentsPansos.sideBar', ['id' => $id])

        <div id="main">
            @include('componentsPansos.header', ['id'=> $id])
            @yield('content')
            @yield('pagination')
            @include('componentsPansos.footer')
        </div>
>>>>>>>> PantiSosial:resources/views/GeneralPagePantiSosial/templatePage.blade.php
    </div>

</body>

</html>
