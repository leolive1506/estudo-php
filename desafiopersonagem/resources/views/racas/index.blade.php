<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Raças') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                <span>Lista de raças</span> |
                <x-nav-link :href="route('racas.create')" :active="request()->routeIs('racas.create')">
                    Criar Raça
                </x-nav-link>
            </h2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse($racas as $raca)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>{{ $raca->nome }}</p>
                        <x-nav-link :href="route('racas.show', $raca->id)" :active="request()->routeIs('racas.show')">
                            Ver Raça
                        </x-nav-link>
                        <x-nav-link :href="route('racas.edit', $raca->id)" :active="request()->routeIs('racas.edit')">
                            Editar
                        </x-nav-link>

                        <x-nav-link :href="route('racas.destroy', $raca->id)"
                            :active="request()->routeIs('racas.destroy')"
                            onclick="return confirm('Apaga essa raça memo mermão?')">
                            Excluir
                        </x-nav-link>
                    </div>
                @empty
                    <div class="p-6 bg-white border-b border-gray-200">
                        Lista de raças
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
