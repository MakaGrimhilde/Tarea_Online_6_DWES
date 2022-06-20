@extends('layout.plantilla')

@section('titulo', 'Detalle')

@section('h', 'Detalle')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <table class="table table-striped text-center">
                <tr>
                    <th>Categoría</th>
                    <th>Escrita por</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Fecha de publicación</i></th>
                    <th>Operaciones</th>
                </tr>
                <tr>
                    <td>{{$entrada->categoria_id}}</td>
                        <td>{{$entrada->usuario_id}}</td>
                        <td>{{$entrada->titulo}}</td>
                        <td><img src="../../blog/imagenes/{{$entrada->imagen}}" width="200" height="250"></td>
                        <td>{{$entrada->descripcion}}</td>
                        <td>{{$entrada->created_at}}</td>
                    <td><a href="{{route('entradas.edit', $entrada->id)}}">Editar</a>
                        <a href="{{route('entradas.destroy', $entrada->id)}}" 
                        onclick="return confirm('Está a punto de eliminar la entrada: {{$entrada->titulo}}, ¿está seguro?')">Eliminar</a>
                        <a href="{{route('entradas.show', $entrada->id)}}">Detalle</a></td>
                    </td>
                </tr>         
            </table>
        </div>
    </div>       
@endsection