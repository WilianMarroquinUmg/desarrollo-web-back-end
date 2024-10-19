<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.index') }}">Inicio</a></li>
                    <li><a href="{{ route('admin.users') }}">Usuarios</a></li>
                    <li><a href="{{ route('admin.settings') }}">Configuración</a></li>
                </ul>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
