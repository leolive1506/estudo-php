<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo personagem') }}
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
        <form action="{{ route('personagens.store') }}" method="POST">
            @csrf
            <input type="text" placeholder="nome" name="nome"> <br />
            <select name="raca_id" id="raca">
                @forelse ($racas as $raca)
                    <option value="{{ $raca->id }}">{{ $raca->nome }}</option>
                @empty
                    Nenhuma raça
                @endforelse
            </select><br />

            <select name="classe_id" id="classe">
                @forelse ($classes as $classe)
                    <option value="{{ $classe->id }}">{{ $classe->nome }}</option>
                @empty
                    Nenhuma classe
                @endforelse
            </select><br />

            <input type="number" placeholder="Level" name="level_personagem"> <br />
            <textarea name="observacoes" placeholder="observações" class="resize-none"></textarea> <br />

            <x-button>Cadastrar</x-button>
        </form>
    </div>
</x-app-layout>
