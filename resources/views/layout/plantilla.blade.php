<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
    <title>Mi pequeño Blog - @yield('titulo')</title>
    <style type="text/css">
        #title {color:khaki;}
    </style>
</head>
<body>
    <div class="row justify-content-center" id="cabecera">    
        <h1><img class="img" src="{{asset('img/logo.png')}}"><a id="title" href="{{route('inicio')}}">Tarea Online 4</a></h1>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('entradas.index')}}">Listar entradas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('entradas.create')}}">Nueva entrada</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.index')}}">Listar usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.create')}}">Nuevo usuario</a>
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