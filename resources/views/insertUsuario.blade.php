@extends('layout.plantilla')

@section('titulo', 'Nuevo usuario')

@section('content')
    <div class="row justify-content-center">
        <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="nick">Usuario</label>
                    <input type="text" class="form-control" id="nick" name="nick"
                        required />  
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password"
                        required />  
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        required />  
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                        required />  
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                        required />  
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen"
                        required />  
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