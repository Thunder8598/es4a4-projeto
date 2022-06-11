@extends('default')

@section('page-classname','pagina-topicos')

@section("main")

<div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">
    <h1>{{$topico->titulo}}</h1>
</div>

<!-- FORMULÁRIO PARA CRIAÇÃO DE NOVO TÓPICO -->
<div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">
    <form class="d-grid gap-3 w-75 mx-auto" id="form-comentario">
        @csrf

        <div class="alert alert-danger" style="display: none"></div>

        <input class="form-control" name="email" type="text" placeholder="Nome do Tópico" aria-label="Nome do Tópico"
            required maxlength="255">
        <textarea class="form-control" name="comentario" placeholder="Comentário" rows="3" required
            maxlength="255"></textarea>

        <div class="d-flex justify-content-around">
            <button class="btn text-white bg-englishViolet" type="submit">Comentar</button>
            <button class="btn btn-dark text-white" type="reset">Limpar</button>
        </div>
    </form>
</div>

<!-- LISTAGEM DOS TÓPICOS EXISTENTES -->
<div class="bg-charcoal mt-5 py-5 w-75 mx-auto rounded">

    <div class="d-grid gap-3 w-75 mx-auto">

        <ul class="list-group gap-3" id="listagem-comentarios"></ul>

        <div class="d-flex justify-content-around">
            <button class="btn text-white bg-englishViolet" id="btn-carregar-comentarios" type="submit">Ver
                Mais</button>
        </div>
    </div>
</div>

@endsection