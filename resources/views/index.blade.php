@extends('default')

@section("main")

<!-- FORMULÁRIO PARA CRIAÇÃO DE NOVO TÓPICO -->
<div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">
    <form class="d-grid gap-3 w-75 mx-auto" action="/topicos" method="POST">
        @csrf

        <input class="form-control" name="topico" type="text" placeholder="Nome do Tópico" aria-label="Nome do Tópico">

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

@endsection