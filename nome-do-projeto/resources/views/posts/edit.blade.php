@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1>Editar</h1>

        @if (session()->has('mensagem'))
            @if (session()->get('status') == 'success')
                <h2 class="alert success">{{ session()->get('mensagem') }}</h2>
            @else
                <h2 class="alert error">{{ session()->get('mensagem') }}</h2>
            @endif

        @endif

        <form action={{ route('posts.update', $post->id) }} method="post">
            @csrf

            @method('PUT')

            <div class="campos">

                <div class="campo">

                    {{-- old('titulo') -> salva os valores digitados caso de erro --}}
                    <input type="text" name="titulo" value='{{ old('titulo', $post->titulo) }}'>

                    {{-- ver se tem erro no camop titulo --}}
                    @error('titulo')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>



                <div class="campo">

                    <textarea name="conteudo" id="conteudo" cols="30"
                        rows="10">{{ old('conteudo', $post->conteudo) }}</textarea>

                    {{-- ver se tem erro no camop titulo --}}
                    @error('conteudo')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="campo">
                    <input type="text" name="tags" , value="{{ old('titulo', $post->titulo) }}">

                    @error('tags')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>






                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>

@endsection
