<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praticando Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('members.index') }}">Lista de membros</a></li>
            </ul>
        </nav>
    </header>

    @yield('container')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
