@extends('layouts.app')

@section('content')
    

<div class="container" >
    <h2 class="titulo-categoria text-uppercase mb-4">Últimas Recetas</h2>
    <div class="d-flex justify-content-center" >
        @foreach ($nuevas as $nueva)
        <div class="item" >
            <div class="card" width="250em">
                <img src="/storage/{{ $nueva->imagen }} " width="250em" class="d-flex img-fluid mx-auto" alt="imagen receta">

                <div class="card-body h-100">
                    <h3>{{ Str::title( $nueva->titulo ) }}</h3>

                    <a href={{ route('recetasShow', ['receta' => $nueva->id ]) }}
                        class="btn btn-primary d-block font-weight-bold text-uppercase"
                    >Ver Receta</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{$nuevas->links()}}
    </div>
</div>

@endsection
