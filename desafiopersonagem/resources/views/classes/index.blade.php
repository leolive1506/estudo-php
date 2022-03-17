<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                <span>Lista de raças</span> |
                <x-nav-link :href="route('classes.create')" :active="request()->routeIs('classes.create')">
                    Criar Classe
                </x-nav-link>
            </h2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse($classes as $classe)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>{{ $classe->nome }}</p>
                        <x-nav-link :href="route('classes.show', $classe->id)"
                            :active="request()->routeIs('classes.show')">
                            Ver Classe
                        </x-nav-link>
                        <x-nav-link :href="route('classes.edit', $classe->id)"
                            :active="request()->routeIs('classes.edit')">
                            Editar
                        </x-nav-link>

                        <x-nav-link :href="route('classes.destroy', $classe->id)"
                            :active="request()->routeIs('classes.destroy')"
                            onclick="return confirm('Vai excluir memo mermão?')">
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
