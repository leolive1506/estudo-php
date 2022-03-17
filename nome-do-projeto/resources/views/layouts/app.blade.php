<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>


    <header>

        <nav>
            <ul>
                <li><a href="/">Página inicial</a></li>
                {{-- melhor convenção --}}
                <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
            </ul>
        </nav>

    </header>
    {{-- yield -> local / seção onde algo será inserido por uma view que estende / usa esse layout --}}
    @yield('conteudo')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
