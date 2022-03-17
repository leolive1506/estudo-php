@extends('layouts.admin')

@section('title', 'esse meme')

{{-- @section('content')
    <h1>Configurações</h1>

    <h1>Meu nome é {{ $nome }}</h1>

    @component('components.alert')

        <h1>Cade o trem mermão</h1>
    @endcomponent


    @if ($idade > 18 && $idade <= 60)
        Eu sou um adulto
    @elseif($idade > 60)
        Eu sou um idoso
    @else
        Eu sou um menor
    @endif

    @isset($versao)
        {{-- se tiver versão --}}
{{-- pegando de AppServiceProvider --}}
{{-- <h1>Versão: {{ $versao }}</h1>
    @endisset

    @for ($i = 0; $i < 10; $i++)
        <p>O valor de i é igual a: {{ $i }}</p>
    @endfor

    @component('components.list')
        @forelse ($lista as $item)
            <li>
                <p>Nome do item: {{ $item['nome'] }}</p>
                <p>Quantidade: {{ $item['qt'] }}</p>
            </li>
        @empty
            <p>Não tem nada mermão</p>
        @endforelse
    @endcomponent







    @empty($estado)
        Não existe cidade
    @endempty



@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('config.index') }}" method="post">
                @csrf
                Nome: <br />
                <input type="text" name="nome" /> <br />

                Idade: <br />
                <input type="text" name="idade" /> <br />

                Estado: <br />
                <input type="text" name="estado" />

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

</x-app-layout>
