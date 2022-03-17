@extends('layouts.app')

@section('content')
    <form action="{{ route('clientes.store') }}" method="POST" class="form-create">
        @csrf

        <h1>Cadastrar novo cliente</h1>

        <div class="group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome">
        </div>

        <div class="group">
            <label for="cpf">CPF</label>
            <input id="cpf" type="text" name="cpf">
        </div>

        <div class="group">
            <label for="data_de_nascimento">Data de nascimento</label>
            <input id="data_de_nascimento" type="text" name="data_de_nascimento">
        </div>

        <div class="group">
            <label for="telefone">Telefone</label>
            <input id="telefone" type="text" name="telefone">
        </div>
        <div class="group">
            <label for="observacoes">Observacoes</label>
            <textarea id="observacoes" type="text" name="observacoes"></textarea>
        </div>

        <div class="group actions">
            <button>Cadastrar</button>
        </div>

    </form>
@endsection
