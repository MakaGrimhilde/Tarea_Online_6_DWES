@extends('layout.plantilla')

@section('titulo', 'Lista de usuarios')

@section('h', 'Lista de usuarios')

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
                
                @foreach ($usuarios as $u)
                    <tr>
                        <td>{{$u->nick}}</td>
                        <td>{{$u->nombre}}</td>
                        <td>{{$u->apellidos}}</td>
                        <td>{{$u->email}}</td>
                        <td><img src="../../public/imagenes/{{$u->imagen}}" width="50"></td>
                        <td><a href="{{route('usuarios.edit', $u->id)}}">Editar</a>
                        <a href="{{route('usuarios.destroy', $u->id)}}">Eliminar</a>
                        <a href="{{route('usuarios.mostrarUsuario', $u->id)}}">Detalle</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        {{$usuarios->links()}}
    </div>     
@endsection