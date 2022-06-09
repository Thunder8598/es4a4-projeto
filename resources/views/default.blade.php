<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Comente Sobre</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
</head>

<body class="bg-fireOpal @yield('page-classname')">
    @include('components.navbar')

    @yield('main')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>