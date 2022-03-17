<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('css/app.css') }}>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="{{ route('clientes.index') }}">Ver clientes</a>
                </li>

                <li>
                    <a href="{{ route('clientes.create') }}">Criar cliente</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        @yield("content")
    </div>
</body>

</html>
