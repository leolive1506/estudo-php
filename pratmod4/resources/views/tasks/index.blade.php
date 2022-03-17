    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Tasks
            </h2>
        </x-slot>



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <table class="w-full table-auto	">
                <thead>
                    <tr>
                        <x-th>ID</x-th>
                        <x-th>Titulo</x-th>
                        <x-th>Ações</x-th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($tasks as $item)

                        <tr
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                            <x-td>{{ $item->id }}</x-td>
                            <x-td>{{ $item->title }}</x-td>
                            <x-td>
                                <x-nav-link href="/">
                                    Ver Detalhes
                                </x-nav-link>
                                <x-nav-link>
                                    Editar
                                </x-nav-link>
                                <x-nav-link>
                                    Apagar
                                </x-nav-link>
                            </x-td>
                        </tr>
                    @empty
                        <tr
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                            <x-td>Sem items</x-td>

                        </tr>
                    @endforelse

        </div>
        </tbody>
        </table>

        </div>

    </x-app-layout>
