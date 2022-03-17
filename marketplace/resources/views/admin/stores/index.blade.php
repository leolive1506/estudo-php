<x-app-layout>
    <x-slot name="header">
        <x-h2>
            Lojas
        </x-h2>
    </x-slot>

    <x-container>
        <div class="flex justify-between items-center">
            <a class="flex justify-center items-center p-4 h-12 transition duration-500 ease-out text-white bg-green-500 hover:bg-green-600 rounded-md" href="{{ route('stores.create') }}">Criar loja</a>
            @if(session()->has('msg'))
                <div>
                    <p>
                        {{ session('msg') }}
                    </p>
                </div>
            @endif
        </div>

        <table class="w-full mt-12">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-right">Loja</th>
                    <th class="px-4 py-2 text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr class="bg-white overflow-hidden shadow-sm sm:rounded-lg bg-white border-b border-gray-200">
                        <td class="p-4 text-left">{{ $store->id }}</td>
                        <td class="p-4 text-right">{{ $store->name }}</td>
                        <td class="p-4 text-right">
                            <a class="px-4 h-12 transition duration-500 ease-out text-white bg-green-500 hover:bg-green-600 rounded-md" href="{{ route('stores.edit', $store->id) }}">Editar</a>
                            <a class="px-4 h-12 transition duration-500 ease-out text-white bg-red-400 hover:bg-red-500 rounded-md" href="{{ route('stores.destroy', $store->id) }}">Remover</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="mt-6">
            {{ $stores->links()}}
        </div>
    </x-container>



</x-app-layout>
