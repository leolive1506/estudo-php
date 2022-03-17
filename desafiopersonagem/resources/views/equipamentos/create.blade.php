<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Equipamento') }}
        </h2>
    </x-slot>


    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('equipamentos.store') }}" method="POST">
            @csrf
            <label
                class="font-semibold text-xl text-gray-800 leading-tight"
            >
                Preencha o nome do Equipamento abaixo
            </label>
            <br>
            <input type="text" placeholder="nome" name="nome" tabindex="1"> <br />

            <label for="">Selecione o tipo de equipamento</label>
            <select name="tipo_equipamento_id" id="">
                @foreach ($tipos_equipamentos as $tipo)
                    <option value="{{ $tipo->id }}">
                        {{ $tipo->nome }}
                    </option>
                @endforeach
            </select>


            <x-button tabindex="2">Concluir</x-button>
        </form>
    </div>
</x-app-layout>
