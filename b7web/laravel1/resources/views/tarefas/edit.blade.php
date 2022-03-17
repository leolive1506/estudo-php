{{-- @extends('layouts.app')

@section('title', 'Edição de tarefas')

@section('content')

@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1>Edição de tarefas</h1>

            @if ($errors->any())
                @component('components.alert')
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                @endcomponent
            @endif



            <form method="POST" action="{{ route('tarefas.update', $data->id) }}">
                @csrf

                <label for="titulo">Insira um Titulo</label>
                <input type="text" value="{{ $data->titulo }}" name="titulo" id="titulo" tabindex="1">

                <button type="submit" tabindex="2">Alterar</button>
            </form>



        </div>
    </div>
</x-app-layout>
