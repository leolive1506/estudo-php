<x-app-layout>
    <x-slot name="header">
        <h2>Visualizando raça</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                <p>
                    ID: {{ $raca->id }}
                </p>
                <p>
                    Raça: {{ $raca->nome }}
                </p>

                <p>
                    Personagens dessa raça:
                    <ul>
                        @foreach ($raca->personagens as $personagem)
                            <li class="text-green-500">
                                {{ $personagem->nome }}
                            </li>
                        @endforeach
                    </ul>
                </p>

                <div class="flex gap-5 my-2 pt-2">
                    <x-nav-link :href="route('racas.edit', $raca->id)"
                        :active="request()->routeIs('racas.edit')">
                        Editar
                    </x-nav-link>

                    <x-nav-link :href="route('personagens.create')" :active="request()->routeIs('personagens.create')">
                        Excluir
                    </x-nav-link>
            </div>
        </div>
</x-app-layout>
