@extends('layout.plantilla')

@section('titulo', 'Importar/Exportar Excel')

@section('h', 'Importar/Exportar una hoja en Excel')

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
                </tr>
                @foreach ($usuarios as $u)
                    <tr>
                        <td>{{$u->nick}}</td>
                        <td>{{$u->nombre}}</td>
                        <td>{{$u->apellidos}}</td>
                        <td>{{$u->email}}</td>
                        <td><img src="../../blog/imagenes/{{$u->imagen}}" width="50"></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <form class="form-horizontal" action="{{route('excel.importar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel">
            <button type="submit" class="btn btn-primary">Importar</button>
        </form>
    </div>
    <br>
    <div class="row justify-content-center">
        <a href="{{route('excel.exportar')}}" class="btn btn-primary">Exportar Excel</a>
    </div> 
    <br>    
@endsection