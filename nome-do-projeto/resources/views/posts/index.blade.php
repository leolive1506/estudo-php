@extends('layouts.app')

@section('conteudo')
    <div class="description">
        <h1>Posts {{ __('messages.welcome') }}</h1>
    </div>

    <div class="acoes">
        <a href="{{ route('posts.create') }}">Novo Post</a>


    </div>

    <form action={{ route('posts.index') }} method="get">
        <input type="text" name="busca">
        <button>Buscar</button>
        <a href="{{ route('posts.index') }}">Limpar filtro</a>
    </form>

    @if (session()->has('mensagem'))
        @if (session()->get('status') == 'success')
            <h2 class="alert success">{{ session()->get('mensagem') }}</h2>
        @else

            <h2 class="alert error">{{ session()->get('mensagem') }}</h2>
        @endif
    @endif

    <ul id="post-list">
        {{-- @foreach ($posts as $post) --}}
        @forelse ($posts as $post)
            <li>
                <div class="id">

                    <strong>ID: </strong>
                    <span>{{ $post->id }}</span>
                </div>

                <div class="title">

                    <strong>Título: </strong>
                    <span>{{ $post->titulo }}</span>
                </div>

                <div class="date-time">

                    <strong>Criado em: </strong>
                    <span>{{ $post->created_at->format('d/m/y H:i:s') }}</span>
                </div>

                <div class="acoes">
                    <strong>Ações</strong>
                    <a href="{{ route('posts.show', $post->id) }}">Visualizar</a>
                    <a href="{{ route('posts.edit', $post->id) }}">Editar</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                        id="delete-{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('delete-{{ $post->id }}').submit();">
                        Excluir
                    </a>
                </div>
            </li>

        @empty
            <li>Sem resultado</li>
        @endforelse
    </ul>
@endsection
