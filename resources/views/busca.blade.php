@extends('default')

@section('page-classname','pagina-busca')

@section("main")

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