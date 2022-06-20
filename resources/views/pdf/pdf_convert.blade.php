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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
    <title>Mi pequeño Blog - Lista de usuarios (Vista PDF)</title>
    <style type="text/css">

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            justify-content: center;
            text-align: center;
        }
 
        tr:nth-child(odd) {
            background-color: #8F9AA5;
        }
    
    </style>
</head>
<body>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <table class="table table-striped text-center" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <th>Nick</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                </tr>
                
                @foreach ($usuarios as $u)
                    <tr>
                        <td>{{$u->nick}}</td>
                        <td>{{$u->nombre}}</td>
                        <td>{{$u->apellidos}}</td>
                        <td>{{$u->email}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>