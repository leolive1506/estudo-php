<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                <span>Lista de raças</span> |
                <x-nav-link :href="route('equipamentos.create')" :active="request()->routeIs('equipamentos.create')">
                    Criar Equipamento
                </x-nav-link>
            </h2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse($equipamentos as $equipamento)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-nav-link
                            class="text-2xl"
                            :href="route('equipamentos.show', $equipamento->id)" :active="request()->routeIs('equipamentos.show')"
                        >{{ $equipamento->nome }}</x-nav-link> <br>
                        {{-- <x-nav-link :href="route('racas.show', $raca->id)" :active="request()->routeIs('racas.show')">
                            Ver Raça
                        </x-nav-link> --}}
                        <x-nav-link :href="route('equipamentos.edit', $equipamento->id)" :active="request()->routeIs('equipamentos.edit')">
                            Editar
                        </x-nav-link>

                        <x-nav-link :href="route('equipamentos.destroy', $equipamento->id)"
                            :active="request()->routeIs('equipamentos.destroy')"
                            onclick="return confirm('Apaga esse equipamento memo mermão?')">
                            Excluir
                        </x-nav-link>
                    </div>
                @empty
                    <div class="p-6 bg-white border-b border-gray-200">
                        Lista de Equipamentos
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
