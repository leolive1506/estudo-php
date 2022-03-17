<x-app-layout>
    <x-slot name="header">
        <x-h2>
            Criar Produto
        </x-h2>
    </x-slot>

    <x-container>
        <div class="flex flex-col justify-center items-center h-full">
            <form class="flex flex-col w-3/5 gap-2 rounded" action="{{ route('products.store') }}" method="POST">
                @csrf
                @method('POST')
                <label class="sr-only" for="name">Nome do produto</label>
                <x-input type="text" name="name" placeholder="Nome do produto" />

                <label class="sr-only" for="description">Descrição</label>
                <x-input type="text" name="description" placeholder="Descrição" />

                <label class="sr-only" for="body">Conteúdo do produto</label>
                <textarea name="body" placeholder="Conteúdo do produto"></textarea>

                <label class="sr-only" for="price">Preço</label>
                <x-input type="text" name="price" placeholder="Preço" />

                <label class="sr-only" for="">Slug</label>
                <x-input type="text" name="slug" placeholder="Slug" />

                <label class="" for="store">Loja</label>
                <select name="store" id="store" class="cursor-pointer">
                    @foreach($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>

                <x-button class="flex justify-center items-center">Concluir</x-button>
            </form>
        </div>
    </x-container>



</x-app-layout>
