@extends('default')

@section('page-classname','pagina-inicial')

@section("main")

<!-- FORMULÁRIO PARA CRIAÇÃO DE NOVO TÓPICO -->
<div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">
    <form class="d-grid gap-3 w-75 mx-auto" action="/topicos" method="POST">
        @csrf

        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
        </div>
        @endif

        <input class="form-control" name="topico" type="text" placeholder="Nome do Tópico" aria-label="Nome do Tópico" required>

        <div class="d-flex justify-content-around">
            <button class="btn btn-dark text-white" type="submit">Cancelar</button>
            <button class="btn text-white bg-englishViolet" type="submit">Criar</button>
        </div>
    </form>
</div>

<!-- LISTAGEM DOS TÓPICOS EXISTENTES -->
<div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">

    <form class="d-grid gap-3 w-75 mx-auto">
        <ul class="list-group gap-3" id="lista-topicos"></ul>

        <div class="d-flex justify-content-around">
            <button class="btn text-white bg-englishViolet" id="btn-carregar-topicos" type="button"
                style="display:none">Ver Mais</button>
        </div>
    </form>
</div>

@endsection