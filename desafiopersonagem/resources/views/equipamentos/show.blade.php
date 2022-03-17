<x-app-layout>
    <x-slot name="header">
        <h2>Visualizando Equipamento</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                <p>
                    ID: {{ $equipamento->id }}
                </p>
                <p>
                    Equipamento: {{ $equipamento->nome }}
                </p>

                <p >
                    Tipo desse equipamento:
                    <span class="text-green-500">
                        {{ $equipamento->tipo_equipamento->nome }}
                    </span>


                </p>

                <div class="flex gap-5 my-2 pt-2">
                    <x-nav-link :href="route('equipamentos.edit', $equipamento->id)"
                        :active="request()->routeIs('equipamentos.edit')">
                        Editar
                    </x-nav-link>

                    <x-nav-link :href="route('equipamentos.create', $equipamento->id)" :active="request()->routeIs('equipamentos.create')">
                        Excluir
                    </x-nav-link>
            </div>
        </div>
</x-app-layout>
