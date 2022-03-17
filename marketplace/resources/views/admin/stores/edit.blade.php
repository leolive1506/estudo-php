<x-app-layout>
    <x-slot name="header">
        <x-h2>
            Editar Loja
        </x-h2>
    </x-slot>

    <x-container>

        <div class="flex flex-col justify-center items-center h-full">
            <form class="flex flex-col w-3/5 gap-2 rounded" action="{{ route('stores.update', $store->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label class="sr-only" for="">Nome da Loja</label>
                <x-input value="{{ old('name', $store->name) }}" type="text" name="name" placeholder="Nome da Loja" />

                <label class="sr-only" for="">Descrição</label>
                <x-input value="{{ old('description', $store->description) }}" type="text" name="description" placeholder="Descrição" />

                <label class="sr-only" for="">Telefone</label>
                <x-input value="{{ old('phone', $store->phone) }}" type="text" name="phone" placeholder="Telefone" />

                <label class="sr-only" for="">Celular</label>
                <x-input value="{{ old('mobile_phone', $store->mobile_phone) }}" type="text" name="mobile_phone" placeholder="Celular" />

                <label class="sr-only" for="">Slug</label>
                <x-input value="{{ old('slug', $store->slug) }}" type="text" name="slug" placeholder="Slug" />

                <x-button class="flex justify-center items-center">Concluir</x-button>
            </form>

        </div>

    </x-container>



</x-app-layout>
