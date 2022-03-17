<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $raca->nome }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="p-6 bg-white border-b border-gray-200 mb-2">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('racas.update', $raca->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="font-semibold text-xl text-gray-800 leading-tight">
                Preencha o <strong class="font-extrabold">Novo</strong> nome da raça
            </label> <br>
            <input type="text" placeholder="nome" name="nome" value="{{ old('nome', $raca->nome) }}"> <br />


            <x-button>Editar</x-button>
        </form>
    </div>
</x-app-layout>
