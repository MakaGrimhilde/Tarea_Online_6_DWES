@extends('layout.plantilla')

@section('titulo', 'Lista de acciones')
@section('h', 'Lista de acciones en la web')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <table class="table table-striped text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre de la acción</th>
                    <th>Fecha de realización</th>
                    <th>Operaciones</th>
                </tr>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{$log->id}}</td>
                        <td>{{$log->accion}}</td>
                        <td>{{$log->created_at}}</td>
                        <td><a href="{{route('logs.destroy', $log->id)}}" 
                        onclick="return confirm('Está a punto de eliminar la acción: {{$log->accion}}, ¿está seguro?')">Eliminar</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        {{$logs->links()}}
    </div>
    <br>
    <div class="row justify-content-center">
        <a href="{{route('logs.view')}}" class="btn btn-primary">Convertir a PDF</a>&nbsp;
    </div>    
@endsection