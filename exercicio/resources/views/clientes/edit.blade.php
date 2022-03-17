@extends('layouts.app')

@section('content')
    @if (session()->has('mensagem'))

        @if (session()->get('status') == 'success')
            <h2 class="alert success">{{ session()->get('mensagem') }}</h2>
        @else
            <h2 class="alert error">{{ session()->get('mensagem') }}</h2>
        @endif
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="form-edit">
        @csrf

        @method("PUT")

        <h1>Atualizar cliente</h1>

        <div class="group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" value={{ old('nome', $cliente->nome) }}>
        </div>

        <div class="group">
            <label for="cpf">CPF</label>
            <input id="cpf" type="text" name="cpf" value={{ old('cpf', $cliente->cpf) }}>
        </div>

        <div class="group">
            <label for="data_de_nascimento">Data de nascimento</label>
            <input id="data_de_nascimento" type="text" name="data_de_nascimento"
                value={{ old('data_de_nascimento', $cliente->data_de_nascimento) }}>
        </div>

        <div class="group">
            <label for="telefone">Telefone</label>
            <input id="telefone" type="text" name="telefone" value={{ old('telefone', $cliente->telefone) }}>
        </div>
        <div class="group">
            <label for="observacoes">Observações</label>
            <textarea id="observacoes" type="text"
                name="observacoes">{{ old('observacoes', $cliente->observacoes) }}</textarea>
        </div>

        <div class="group actions">
            <a href="{{ route('clientes.index') }}">Voltar</a>
            <button type="submit">Alterar</button>
        </div>

    </form>
@endsection
