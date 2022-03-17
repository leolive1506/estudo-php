@extends('layouts.app')

@section('conteudo')
    <h1>Novo Post</h1>

    {{-- action="" pra onde sera enviado
            valores: link(rota) ou nome do arquivo(antigo) --}}
    <form action="{{ route('posts.store') }}" method="post">
        {{-- @csrf -> campo oculto que ele cria autenticar o formulário --}}
        @csrf


        {{-- escuta os erros a variavel erros --}}
        {{-- em alguma coisa dentro de erros --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="campos">
            <input type="text" name="titulo" placeholder="Digite o titulo do post aqui">

            <textarea name="conteudo" id="conteudo" cols="30" rows="10"></textarea>

            <input type="text" name="tags" placeholder="Digite as tags">
        </div>


        <button type="submit">Salvar</button>
    </form>
@endsection
