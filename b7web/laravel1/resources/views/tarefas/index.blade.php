{{-- @extends('layouts.app')

@section('title', 'Listagem de Tarefas')

@section('content')
    <div class="header-content">

        <h1></h1>


    </div>

    <ul class="container-list">

            <li>
                <div class="item-list">

                </div>
            </li>


    </ul>
@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listagem de Tarefas') }}
            <a href="{{ route('tarefas.create') }}" tabindex="1"
                class="p-3 bg-green-500 my-4 text-gray-100 hover:bg-green-400 transition duration-500 ease-in-out">
                Adicionar Nova Tarefa
            </a>
        </h2>
    </x-slot>


    <div class="py-12">
        <ul>
            @forelse ($list as $item)
                <li class="mt-4">

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">

                                <a href="{{ route('tarefas.done', $item->id) }}">
                                    @if ($item->resolvido === 1) Desmarcar @else Marcar @endif
                                </a>
                                <p>ID: {{ $item->id }}</p>
                                <p>Descrição: {{ $item->titulo }}</p>
                                <p>Status:
                                    @if ($item->resolvido === 1)
                                        Resolvido
                                    @else Resolver
                                    @endif
                                </p>

                                <a href={{ route('tarefas.edit', $item->id) }}
                                    class="bg-green-500 px-2 h-3 text-gray-100 hover:bg-green-700">
                                    Editar
                                </a>
                                <a href="{{ route('tarefas.destroy', $item->id) }}"
                                    class="bg-red-500 px-2 h-3 text-gray-100 mx-2"
                                    onclick="return confirm('Tem certeza que deseja deletar') "
                                    class="excluir">Excluir
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li>Sem itens</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
