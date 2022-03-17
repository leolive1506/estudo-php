<x-app-layout>
    <x-slot name="header">
        <x-h2>
            Criar Loja
        </x-h2>
    </x-slot>

    <x-container>

        <div class="flex flex-col justify-center items-center h-full">
            <form class="flex flex-col w-3/5 gap-2 rounded" action="{{ route('stores.store') }}" method="POST">
                @csrf
                @method('POST')
                <label class="sr-only" for="">Nome da Loja</label>
                <x-input type="text" name="name" placeholder="Nome da Loja" />

                <label class="sr-only" for="">Descrição</label>
                <x-input type="text" name="description" placeholder="Descrição" />

                <label class="sr-only" for="">Telefone</label>
                <x-input type="text" name="phone" placeholder="Telefone" />

                <label class="sr-only" for="">Celular</label>
                <x-input type="text" name="mobile_phone" placeholder="Celular" />

                <label class="sr-only" for="">Slug</label>
                <x-input type="text" name="slug" placeholder="Slug" />

                <label class="sr-only" for="user">Usuário</label>
                <select name="user" id="user" class="cursor-pointer">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <x-button class="flex justify-center items-center">Concluir</x-button>
            </form>

        </div>



    </x-container>



</x-app-layout>
