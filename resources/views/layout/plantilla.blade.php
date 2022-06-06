<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
    <title>Mi pequeño Blog - @yield('titulo')</title>
</head>
<body>
    <div class="row justify-content-center" id="cabecera">    
        <h1><img class="img" src="{{asset('img/logo.png')}}">Tarea Online 4</h1>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('entradas.mostrarEntradas')}}">Listar entradas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('entradas.mostrarEntradas')}}">Nueva entrada</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.mostrarUsuarios')}}">Listar usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.mostrarNuevo')}}">Nuevo usuario</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Cerrar sesión</a>
        </li>
    </ul>
    <br/>
    <div class="row justify-content-center">
        <h3>@yield('h')</h3>
    </div>
    <br>
    @yield('content')
</body>
</html>