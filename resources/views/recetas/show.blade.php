@extends('layouts.app')
@section('content')
    <div class="jumbotron container mx-auto">

        <div class="row">
            <h1 class="mx-auto text-dark">{{$receta->nombre}}</h1>
        </div>
        <div class="mx-auto">
        <img src="/storage/{{$receta->imagen}}" class="d-flex img-fluid mx-auto">
        </div>

        <div class="mt-5 row ml-3">
            <div>
                <h4 class="col text-danger">Categoria:</h4>
            </div>
            <div class="mt-4 col-md-auto">
                {{$receta->categoria->categoria}}
            </div>
        </div>

        <div class="mt-5 row ml-3">
            <div>
                <h4 class="col text-danger">Ingredientes:</h4>
            </div>
            <div class="mt-4 col-md-auto">
                {!! $receta->ingredientes !!}
            </div>
        </div>
        

        <div class="mt-5 row pt-3 ml-3">
            <div>
                <h4 class="col text-danger">Preparacion:</h4>
            </div>
            <div class="mt-4 col-md-auto">
                <p>{!! $receta->preparacion !!}</p>
            </div>
        </div>
        
        <div class="mt-5 pt-5 row">
            <div class="mx-auto d-flex align-items-start">
                <h5 class="text-danger">Autor:&nbsp<a href="#" class="badge badge-secondary">{{$receta->usuario->name}}</a></h5>
                
            </div>
            <div class="mx-auto d-flex">
                <h5 class="text-danger">Creado el:&nbsp</h5>
                <p>{{$receta->created_at}}</p>
            </div>
        </div>
    </div>
@endsection