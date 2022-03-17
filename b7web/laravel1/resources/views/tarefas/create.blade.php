<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Tarefas') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Adição de tarefas</h1>

            @if ($errors->any())
                @component('components.alert')
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endcomponent
            @endif

            @if ($campoView)

                <form method="POST" action="{{ route('tarefas.store') }}">
                    @csrf
                    <label for="titulo">Insira um Titulo</label>
                    <input type="text" name="titulo" id="titulo" tabindex="1">

                    <button type="submit" tabindex="2">Adicionar</button>
                </form>

            @else

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Somente admins tem acesso a esse campo
                    </div>
                </div>

            @endif

        </div>
    </div>
</x-app-layout>
