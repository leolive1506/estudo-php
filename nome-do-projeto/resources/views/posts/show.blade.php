@extends('layouts.app')

@section('conteudo')
    <div class="id">

        <strong>ID: </strong>
        <span>{{ $post->id }}</span>
    </div>

    <div class="title">

        <strong>Título: </strong>
        <span>{{ $post->titulo }}</span>
    </div>

    <div class="date-time">

        <strong>Criado em: </strong>
        <span>{{ $post->created_at->format('d/m/y H:i:s') }}</span>
    </div>

    <div class="conteudo">
        <strong>Descrição do item: </strong>
        <span>{!! nl2br($post->conteudo) !!}</span>
    </div>
@endsection
