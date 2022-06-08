<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Comente Sobre</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
</head>

<body class="bg-fireOpal">

    <!-- BARRA DE NAVEGAÇÃO -->
    <header>
        <nav class="navbar navbar-expand-lg bg-charcoal">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Comente Sobre
                </a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Busca de tópicos" aria-label="buscar">
                    <button class="btn text-white bg-englishViolet" type="submit">buscar</button>
                </form>
            </div>
        </nav>
    </header>

    <!-- FORMULÁRIO PARA CRIAÇÃO DE NOVO TÓPICO -->
    <div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">
        
        <form class="d-grid gap-3 w-75 mx-auto">

            <input class="form-control" type="text" placeholder="Nome do Tópico" aria-label="Nome do Tópico">

            <div class="d-flex justify-content-around">
                <button class="btn btn-dark text-white" type="submit">Cancelar</button>
                <button class="btn text-white bg-englishViolet" type="submit">Criar</button>
            </div>
        </form>
    </div>

    <!-- LISTAGEM DOS TÓPICOS EXISTENTES -->
    <div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">
        
        <form class="d-grid gap-3 w-75 mx-auto">

            <ul class="list-group gap-3">
                <li class="list-group-item bg-white">Tópico recente</li>
                <li class="list-group-item bg-white">Tópico recente</li>
                <li class="list-group-item bg-white">Tópico recente</li>
                <li class="list-group-item bg-white">Tópico recente</li>
                <li class="list-group-item bg-white">Tópico recente</li>
            </ul>

            <div class="d-flex justify-content-around">
                <button class="btn text-white bg-englishViolet" type="submit">Ver Mais</button>
            </div>
        </form>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
