@extends('layout.plantilla')

@section('titulo', 'Nueva entrada')

@section('h', 'Escribir una nueva entrada')

@section('content')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'descripcion' );
    </script>
    <div class="row justify-content-center">
        <form action="{{route('entradas.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}"/>
                
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
            <textarea class="ckeditor" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
            
            @if($errors->any())
                <br>
                @error('descripcion')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror 
            @endif
            <br/>
            <div class="row">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen"/> 
                
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