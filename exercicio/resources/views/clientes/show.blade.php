@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title-show">Cliente: {{ $cliente->nome }}</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>Telefone</th>
                    <th>Observações</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->data_de_nascimento }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->observacoes }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
