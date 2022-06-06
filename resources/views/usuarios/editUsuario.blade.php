@extends('layout.plantilla')

@section('titulo', 'Editar usuario')

@section('h', 'Editar Usuario')

@section('content')
    <div class="row justify-content-center">
        <form action="{{route('usuarios.update', $usuario)}}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('put')

            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="nick">Usuario</label>
                    <input type="text" class="form-control" id="nick" name="nick" value="{{$usuario->nick}}"
                        required />  
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" 
                    value="{{$usuario->password}}" required />  
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$usuario->email}}"
                        required />  
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen"
                        required />
                    <img src="../../imagenes/{{$usuario->imagen}}" width="60">  
                </div>
            </div>
            <br/>
            
            <br/>
            <!--botones para enviar los datos recogidos en el formulario y para limpiar los campos-->
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary" name="boton">Enviar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
            </div>
        </form>
    </div>
@endsection