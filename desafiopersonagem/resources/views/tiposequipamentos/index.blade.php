<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipos de tiposequipamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                <span>Lista de Tipos de tipos equipamentos</span> |
                <x-nav-link :href="route('tipostiposequipamentos.create')" :active="request()->routeIs('tipostiposequipamentos.create')">
                    Criar Equipamento
                </x-nav-link>
            </h2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse($tipos as $tipo)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-nav-link
                            class="text-2xl"
                            :href="route('tiposequipamentos.show', $tipo->id)" :active="request()->routeIs('tiposequipamentos.show')"
                        >{{ $tipo->nome }}</x-nav-link> <br>

                        {{-- <x-nav-link :href="route('tipostiposequipamentos.show', $tipo->id)" :active="request()->routeIs('tipostiposequipamentos.show')">
                            Ver Raça
                        </x-nav-link> --}}
                        <x-nav-link :href="route('tipostiposequipamentos.edit', $tipo->id)" :active="request()->routeIs('tipostiposequipamentos.edit')">
                            Editar
                        </x-nav-link>

                        <x-nav-link :href="route('tipostiposequipamentos.destroy', $tipo->id)"
                            :active="request()->routeIs('tipostiposequipamentos.destroy')"
                            onclick="return confirm('Apaga esse equipamento memo mermão?')">
                            Excluir
                        </x-nav-link>
                    </div>
                @empty
                    <div class="p-6 bg-white border-b border-gray-200">
                        Lista de tiposequipamentos
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
