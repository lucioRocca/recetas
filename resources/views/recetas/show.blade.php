@extends('layouts.app')
@section('content')

<div class="container">

    <div class="jumbotron">
        
        <div class="d-flex justify-content-center">
            <h1 class="text-dark">{{$receta->nombre}}</h1>
        </div>


        <div class="d-flex justify-content-center">
            <img src="/storage/{{$receta->imagen}}" class="d-flex img-fluid mx-auto">
        </div>


        <div class="mt-5 row">

            <div class="col-5 text-center text-wrap">
                <h5 class="text-danger ">Categoria:</h5>
            </div>

            <div class="col-7">
                {{$receta->categoria->categoria}}
            </div>

        </div>


        <div class="mt-5 row">

            <div class="col-5 text-center text-wrap">
                <h5 class="text-danger">Ingredientes:</h5>
            </div>
            
            <div class="col-7">
                {!! $receta->ingredientes !!}
            </div>

        </div>
        

        <div class="mt-5 row">

            <div class="col-5 text-center text-wrap">
                <h5 class="text-danger">Preparacion:</h5>
            </div>

            <div class="col-7">
                <p>{!! $receta->preparacion !!}</p>
            </div>

        </div>
        

        <div class="mt-5  row">

            <div class="mx-auto d-flex align-items-start">
                <h5 class="text-danger">Autor:&nbsp<a href="#" class="badge badge-secondary">{{$receta->usuario->name}}</a></h5>
            </div>

            <div class="mx-auto d-flex">
                <h5 class="text-danger">Creado el:&nbsp</h5>
                <p>{{$receta->created_at}}</p>
            </div>

        </div>


    </div>

</div>
@endsection