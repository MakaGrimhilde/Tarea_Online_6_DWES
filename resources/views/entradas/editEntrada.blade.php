@extends('layout.plantilla')

@section('titulo', 'Editar entrada')

@section('h', 'Editar entrada')

@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'descripcion' );
    </script>
    <div class="row justify-content-center">
        <form action="{{route('entradas.update', $entrada)}}" method="POST" enctype="multipart/form-data">

            @csrf
            
            @method('put')

            <div class="row">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" 
                value="{{old('titulo', $entrada->titulo)}}"/>  

                @if($errors->any())
                <br>
                @error('titulo')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror 
            @endif
            </div>
            <br/>
            <div class="row">
                <label for="descripcion">Descripción</label>
            </div>
            <textarea class="ckeditor" id="descripcion" name="descripcion">{{old('descripcion', $entrada->descripcion)}}</textarea>
            <br/>
            @if($errors->any())
                <br>
                @error('descripcion')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror 
            @endif
            <div class="row">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen"/>
                <td><img src="../../blog/imagenes/{{$entrada->imagen}}" width="50"></td>
                
                @if($errors->any())
                    <br>
                    @error('imagen')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror 
                @endif
            </div>
            <br/>
            <!--botones para enviar los datos recogidos en el formulario y para limpiar los campos-->
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary" name="boton">Enviar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
            </div>
            <br/>
            <br/>
        </form>
    </div>
@endsection