<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Tarefa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl	text-gray-700 text-center">Preecha os campos abaixo</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('tasks.store') }}" class="flex flex-col justify-center">

                    <div class=" mx-10 flex flex-col gap-2 p-6">

                        <input type="text" placeholder="Titulo" name="title">
                        <textarea type="text" placeholder="Descrição" name="description"
                            class="resize-none"></textarea>
                        <button type="submit"
                            class="bg-green-400 hover:bg-green-500 transition duration-500 ease-out px-2 h-12">Concluir</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
