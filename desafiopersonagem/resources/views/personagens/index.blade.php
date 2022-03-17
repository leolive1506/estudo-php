<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personagems') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                <x-nav-link :href="route('personagens.create')" :active="request()->routeIs('personagens.create')">
                    Criar persongem
                </x-nav-link>
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                @forelse($personagens as $personagem)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-nav-link :href="route('personagens.show', $personagem->id)"
                            :active="request()->routeIs('personagens.show')">
                            {{ $personagem->nome }}
                        </x-nav-link>
                        <p>Raça: {{ $personagem->raca->nome }}</p>
                        <p>Classe: {{ $personagem->classe->nome }}</p>
                        <p>Level: {{ $personagem->level_personagem }}</p>
                        <div class="flex gap-5 my-2 pt-2">
                            <x-nav-link :href="route('personagens.edit', $personagem->id)"
                                :active="request()->routeIs('personagens.edit')">
                                Editar
                            </x-nav-link>

                            <x-nav-link :href="route('personagens.destroy', $personagem->id)"
                                :active="request()->routeIs('personagens.destroy')"
                                onclick="return confirm('Apaga o bichim memo doido?')">
                                Excluir
                            </x-nav-link>

                        </div>
                    </div>
                @empty
                    <div class="p-6 bg-white border-b border-gray-200">
                        Lista de persongens
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
