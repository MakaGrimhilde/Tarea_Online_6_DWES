@extends('layout.plantilla')

@section('titulo', 'Detalle')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <table class="table table-striped text-center">
                <tr>
                    <th>Nick</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Operaciones</th>
                </tr>
                <tr>
                    <td>{{$usuario->nick}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{$usuario->email}}</td>
                    <td><img src="../../public/imagenes/{{$usuario->imagen}}" width="50"></td>
                    <td><a href="">Editar</a>
                        <a href="">Eliminar</a>
                        <a href="{{route('mostrarUsuario', $usuario->id)}}">Detalle</a></td>
                    </td>
                </tr>         
            </table>
        </div>
    </div>       
@endsection