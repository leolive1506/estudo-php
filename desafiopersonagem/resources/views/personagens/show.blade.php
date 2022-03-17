<x-app-layout>
    <x-slot name="header">
        <h2>{{ $personagem->nome }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                <p>
                    Raça: {{ $raca->nome }}
                </p>
                <p>
                    Classe: {{ $classe->nome }}
                </p>
                <p>
                    Level: {{ $personagem->level_personagem }}
                </p>


                <div class="flex gap-5 my-2 pt-2">
                    <x-nav-link :href="route('personagens.edit', $personagem->id)"
                        :active="request()->routeIs('personagens.edit')">
                        Editar
                    </x-nav-link>

                    <x-nav-link :href="route('personagens.create')" :active="request()->routeIs('personagens.create')">
                        Excluir
                    </x-nav-link>
                </div>
            </div>
</x-app-layout>
