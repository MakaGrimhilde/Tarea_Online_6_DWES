@extends('layout.plantilla')

@section('titulo', 'Lista de entradas')

@section('h', 'Lista de entradas')

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
                    <th>@sortablelink('created_at', 'Fecha de publicación')</th>
                    <th>Operaciones</th>
                </tr>
                
                @foreach ($entradas as $e)
                    <tr>
                        <td>{{$e->categoria_id}}</td>
                        <td>{{$e->usuario_id}}</td>
                        <td>{{$e->titulo}}</td>
                        <td><img src="../../public/imagenes/{{$e->imagen}}" width="50"></td>
                        <td>{{$e->descripcion}}</td>
                        <td>{{$e->created_at}}</td>
                        <td><a href="">Editar</a>
                        <a href="{{route('entradas.destroy', $e->id)}}">Eliminar</a>
                        <a href="{{route('entradas.show', $e->id)}}">Detalle</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        {!! $entradas->appends(Request::except('page'))->render() !!}
    </div>     
@endsection