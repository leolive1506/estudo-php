<x-app-layout>
    <x-slot name="header">
        <x-h2>
            Produtos
        </x-h2>
    </x-slot>

    <x-container>
        <div class="flex justify-between items-center">
            <a class="flex justify-center items-center p-4 h-12 transition duration-500 ease-out text-white bg-green-500 hover:bg-green-600 rounded-md" href="{{ route('products.create') }}">Criar Produto</a>
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
                    <th class="px-4 py-2 text-right">Nome</th>
                    <th class="px-4 py-2 text-right">Preço</th>
                    <th class="px-4 py-2 text-right">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white overflow-hidden shadow-sm sm:rounded-lg bg-white border-b border-gray-200">
                        <td class="p-4 text-left">{{ $product->id }}</td>
                        <td class="p-4 text-right">{{ $product->name }}</td>
                        <td class="p-4 text-right">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="p-4 text-right flex items-center justify-end gap-4">
                            <a class="px-4 h-6 transition duration-500 ease-out text-white bg-green-500 flex items-center hover:bg-green-600 rounded-md" href="{{ route('products.edit', $product->id) }}">Editar</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 transition duration-500 ease-out text-white hover:bg-red-500 bg-red-400 rounded-md" type="submit" >Remover</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="mt-6">
            {{ $products->links()}}
        </div>
    </x-container>



</x-app-layout>
