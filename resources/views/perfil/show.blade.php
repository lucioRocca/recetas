@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron row">
        <div class="col-5 text-center">
    
            @if ($perfil->imagen != '')
                <div class="d-flex justify-content-center">
                    <img src="/storage/{{$perfil->imagen}}" width="250em" class="d-flex img-fluid mx-auto">
                </div>
            @else
            
                @if (Auth::user()->id === $perfil->usuario->id)
                    <a href={{route('perfilEdit',['perfil' => $perfil])}} class="btn mx-auto btn-primary">Agregar Imagen</a>
                
                    <div class="mt-5">
                @else
                    <div>        
                @endif

                    <h5 class="text-danger">Nombre:&nbsp</h5>
                    <p>{{$perfil->usuario->name}}</p>
                </div>
            
            @endif

        </div>

        <div class="col-7 text-center">
        
            <div>
                @if ($perfil->descripcion != '')
                    <h5 class="text-danger">Descripción:&nbsp</h5>
                    <p>{{$perfil->descripcion}}</p>
                @else

                    @if (Auth::user()->id === $perfil->usuario->id)
                        <a href={{route('perfilEdit',['perfil' => $perfil])}} class="btn mx-auto btn-primary">Agregar Descripcion</a>
                    
                    @else   
                        <h5 class="text-danger">Descripción:&nbsp</h5>
                        <p>El usuario no agrego una descripción</p>
                    @endif                    
                @endif

            </div>

            <div class="mt-5">
                @if ($perfil->url != '')
                    <h5 class="text-danger">URL:&nbsp</h5>
                    <p>{{$perfil->url}}</p>
                @else

                    @if (Auth::user()->id === $perfil->usuario->id)
                        <a href={{route('perfilEdit',['perfil' => $perfil])}} class="btn mx-auto btn-primary">Agregar URL</a>
                    
                    @else   
                        <h5 class="text-danger">URL:&nbsp</h5>
                        <p>El usuario no agrego una URL</p>
                    @endif                    
                @endif
            </div>

        </div>
        
        
        
        @if (Auth::user()->id === $perfil->usuario->id)
            <div class="col-12">
                <a href={{route('perfilEdit',['perfil' => $perfil])}} class="btn float-right btn-secondary"> EDITAR&nbsp
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                </a>
            </div>
        @endif

    </div>
</div>
@endsection