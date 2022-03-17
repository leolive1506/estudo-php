<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Equipamento') }}
        </h2>
    </x-slot>


    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('tiposequipamentos.store') }}" method="POST">
            @csrf
            <label
                class="font-semibold text-xl text-gray-800 leading-tight"
            >
                Preencha o nome do equipamento abaixo
            </label>
            <br>
            <input type="text" placeholder="nome" name="nome" tabindex="1"> <br />


            <x-button tabindex="2">Concluir</x-button>
        </form>
    </div>
</x-app-layout>
