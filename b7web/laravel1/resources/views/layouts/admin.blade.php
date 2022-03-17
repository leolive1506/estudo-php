<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LARAVEL 1</title>
</head>

<body>
    <header>

        <h1>Admin</h1>
        <ul>
            <li>
                <a href="{{ route('config.info') }}">Info</a>
            </li>
            <li>
                <a href="{{ route('config.permissoes') }}">Permissoes</a>
            </li>
        </ul>

    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        <h1>Rodapé</h1>
    </footer>
</body>

</html>
