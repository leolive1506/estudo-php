<x-nav-link :href="route('personagens.edit', $personagem->id)" :active="request()->routeIs('personagens.edit')">
    Editar
</x-nav-link>

<x-nav-link :href="route('personagens.create')" :active="request()->routeIs('personagens.create')"
    class="text-red-500">
    Excluir
</x-nav-link>
