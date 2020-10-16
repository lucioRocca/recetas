@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection

@section('content')

 <div class="d-flex justify-content-center">
     <h1>Crear Receta</h1>
 </div>
  
  <form class='jumbotron d-block row' action="{{route('recetasUpdate', ['receta' => $receta] )}}" method="POST" enctype="multipart/form-data">
    
    @method('PUT')
    @csrf
    <div class="form-group w-50 mx-auto">
      <label for="nombre">Nombre</label>
    <input type="text" name='nombre' class="form-control" id="nombre" value="{{$receta->nombre}}" placeholder="'Pan Casero'">
    </div>
    @error('nombre')
        <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
            {{$message}}
        </div>
    @enderror

    
    <div class="form-group w-50 mx-auto">
      <label for="categoria">Categoria</label>

      <select id='categoria' name='categoria' class="form-control">
        <option value="">--Seleccione la Categoria--</option>
        @foreach ($categorias as $categoria)
          <option value="{{$categoria->id}}" {{$receta->categoria->id == $categoria->id ? 'selected' : ''}}>{{$categoria->categoria}}</option>
        @endforeach
      </select>
    </div>

    @error('categoria')
        <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
            {{$message}}
        </div>
    @enderror
    
    <div class="form-group w-50 mx-auto">
        <label for="ingredientes">Ingredientes</label>
        <input type="hidden" name='ingredientes' class="form-control" id="ingredientes" value="{{$receta->ingredientes}}">
        <trix-editor class='bg-white' input='ingredientes'></trix-editor>
    </div>
    @error('ingredientes')
        <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
            {{$message}}
        </div>
    @enderror
    
    <div class="form-group w-50 mx-auto">
        <label for="preparacion">Preparacion</label>
        <input type="hidden" name='preparacion' class="form-control" id="preparacion" value="{{$receta->preparacion}}">
    <trix-editor class='bg-white' input='preparacion'></trix-editor>
    </div>
    @error('preparacion')
        <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
            {{$message}}
        </div>
    @enderror
      
      <div class="form-group w-50 mx-auto">
        <label for="imagen">Imagen</label>
            <img src="/storage/{{$receta->imagen}}" class="d-flex img-thumbnail img-fluid mx-auto">

        <input type="file" name='imagen' class="form-control" id="imagen" placeholder="'Pan Casero'">
      </div>
      @error('imagen')
        <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
            {{$message}}
        </div>
      @enderror

    <div class="form-group w-50 mx-auto">
      <input type="submit" class="btn btn-dark" value="Editar Receta">
    </div>
  
  </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
@endsection