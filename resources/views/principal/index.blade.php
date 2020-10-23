@extends('layouts.app')

@section('content')

@if (auth()->user())
    @if (auth()->user()->like->count() > 0)
        <div class="container" >
            <h2 class="titulo-categoria text-uppercase mb-4">Recetas que le diste like</h2>
            <div class="d-flex justify-content-center" >
                @foreach ($recetaslike as $recetalike)
                <div class="item" >
                    <div class="card" width="250em">
                        <img src="/storage/{{ $recetalike->imagen }} " width="250em" class="d-flex img-fluid mx-auto" alt="imagen receta">

                        <div class="card-body h-100 text-center">
                            <h3>{{ Str::title( $recetalike->nombre ) }}</h3>

                            <a href={{ route('recetasShow', ['receta' => $recetalike->id ]) }}
                                class="btn btn-primary d-block font-weight-bold text-uppercase"
                            >Ver Receta</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$recetaslike->links()}}
            </div>
        </div>
    @endif
    
@endif

<div class="container" >
    <h2 class="titulo-categoria text-uppercase mb-4">Últimas Recetas</h2>
    <div class="d-flex justify-content-center" >
        @foreach ($nuevas as $nueva)
        <div class="item" >
            <div class="card" width="250em">
                <img src="/storage/{{ $nueva->imagen }} " width="250em" class="d-flex img-fluid mx-auto" alt="imagen receta">

                <div class="card-body h-100 text-center">
                    <h3>{{ Str::title( $nueva->nombre ) }}</h3>

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

<div class="container" >
    @foreach ($recetasCategorias as $categoria => $recetas)
        <h2 class="titulo-categoria text-uppercase mb-4">{{$categoria}}</h2>
        <div class="d-flex justify-content-center" >
            @foreach ($recetas as $receta)
                <div class="item" >
                    <div class="card" width="250em">
                        <img src="/storage/{{ $receta->imagen }} " width="250em" class="d-flex img-fluid mx-auto" alt="imagen receta">

                        <div class="card-body h-100 text-center">
                            <h3>{{ Str::title( $receta->nombre ) }}</h3>

                            <a href={{ route('recetasShow', ['receta' => $receta->id ]) }}
                                class="btn btn-primary d-block font-weight-bold text-uppercase"
                            >Ver Receta</a>
                        </div>
                    </div> 
                </div>

            @endforeach 
        </div>

        <div class="d-flex justify-content-center">
            {{$recetas->links()}}
        </div>
    @endforeach


</div>


@endsection
