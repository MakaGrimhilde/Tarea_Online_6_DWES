@extends('layout.plantilla')

@section('titulo', 'Inicio')

@section('content')
<div class="row justify-content-center">
    <form class="form" type="get" action="{{route('entradas.buscar')}}">
        <input class="form-control my-2 my-sm-0" name="buscar" type="search" placeholder="Buscar...">
        <button class="btn btn-primary" type="submit">Buscar</button>
    </form>
</div>
<br>
<div class="row justify-content-center" id="lorem">
    <p style="text-align:center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        Molestiae minus error ex sapiente nulla voluptate eveniet obcaecati, cupiditate delectus unde qui, placeat officiis culpa numquam iste! 
        </p>
</div>
<br>
<div class="row justify-content-center">
    <img src="{{asset('img/blog.png')}}" width="500" height="300">
</div>
@endsection