@extends('layouts.app')

@section('content')
    <h1>Lista de Clientes</h1>
    <div class="container-search">

        <form action="{{ route('clientes.index') }}" method="get">

            <select name="option" id="search">
                <option value="nome">Nome</option>
                <option value="cpf">CPF</option>
            </select>
            <input type="search" name="q">
            <button>Buscar</button>
            <a href="{{ route('clientes.index') }}">Limpar Filtro</a>

        </form>
    </div>

    <ul class="container-list">
        @forelse ($clientes as $cliente)

            <li>
                <div class="item-list">
                    <strong>ID: </strong>
                    <span>{{ $cliente->id }}</span>
                </div>

                <div class="item-list">
                    <strong>Nome: </strong>
                    <span>{{ $cliente->nome }}</span>
                </div>
                <div class="item-list">
                    <strong>Data de nascimento </strong>
                    <span>{{ $cliente->data_de_nascimento }}</span>
                </div>

                <div class="acoes">
                    <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                    <a href="{{ route('clientes.show', $cliente->id) }}">Ver +</a>

                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                        id="delete-{{ $cliente->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a href="#"
                        onclick="document.querySelector('.modal-container').classList.toggle('invisivel')">Excluir</a>
                </div>
            </li>

        @empty
            <li>Nenhum item na lista</li>

        @endforelse
    </ul>

    {{-- <div class="modal-container invisivel">
        <div class="modal">
            <h2>Confirmar exclusão</h2>
            <button type="button"
                onclick="event.preventDefault(); document.getElementById('delete-{{ $cliente->id }}').submit();">Confirmar</button>
        </div>
    </div> --}}
@endsection
