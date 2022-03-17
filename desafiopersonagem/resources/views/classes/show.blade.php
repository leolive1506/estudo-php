<x-app-layout>
    <x-slot name="header">
        <h2>Visualizando raça</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                <p>
                    ID: {{ $classe->id }}
                </p>
                <p>
                    Classe: {{ $classe->nome }}
                </p>

                <p>
                    Personagens dessa raça:
                    <ul>
                        @forelse ($classe->personagens as $personagem)
                            <li class="text-green-500">
                                {{ $personagem->nome }}
                            </li>
                        @empty
                            <li class="text-red-500">
                                Nenhum personagem com essa raça
                            </li>
                        @endforelse
                    </ul>
                </p>

                <div class="flex gap-5 my-2 pt-2">
                    <x-nav-link :href="route('classes.edit', $classe->id)"
                        :active="request()->routeIs('classes.edit')">
                        Editar
                    </x-nav-link>

                    <x-nav-link :href="route('classes.create', $classe->id)" :active="request()->routeIs('classes.create')">
                        Excluir
                    </x-nav-link>
            </div>
        </div>
</x-app-layout>
