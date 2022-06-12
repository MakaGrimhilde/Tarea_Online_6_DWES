@extends('layout.plantilla')


@section('titulo', 'Nuevo usuario')

@section('h', 'Nuevo usuario')

@section('content')
    
    <div class="row justify-content-center">
        <form action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="nick">Usuario</label>
                    <input type="text" class="form-control" id="nick" name="nick" value="{{old('nick')}}"/>

                    @if($errors->any())
                        <br>
                        @error('nick')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" 
                    value="{{old('password')}}"/>
                    
                    @if($errors->any())
                        <br>
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}"/>
                    
                    @if($errors->any())
                        <br>
                        @error('nombre')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" 
                    value="{{old('apellidos')}}"/>
                    
                    @if($errors->any())
                        <br>
                        @error('apellidos')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm">
                    <!--cuadro de texto para recoger el nombre-->
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"/>
                    
                    @if($errors->any())
                        <br>
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </div>
                <div class="col-sm">
                    <!--cuadro de texto para recoger la contraseña-->
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen"/>
                    
                    @if($errors->any())
                        <br>
                        @error('imagen')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
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
        <br>
    </div>
@endsection