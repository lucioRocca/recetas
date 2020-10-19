@extends('layouts.app')

@section('content')

<form action={{route('perfilUpdate', ['perfil' => $perfil])}} method="POST" id="form-actualizar" enctype="multipart/form-data">
@csrf
@method('patch')

    <div class="container">
        <div class="jumbotron row">
        
        
            <div class="col-5 text-center">
                
                <div class="d-flex justify-content-center">
                    <img src="/storage/{{$perfil->imagen}}" width="300px" class="d-flex img-fluid mx-auto">
                </div>

                <div class="mt-2">
                    <input type="file" name="imagen" id="imagen">
                    @error('imagen')
                        <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mt-5">
                    <h5 class="text-danger">Nombre:&nbsp</h5>
                    <p>{{Auth::user()->name}}</p>
                </div>
                
            </div>

            <div class="col-7 text-center">
                
               

                <div>
                    <label for='descripcion' class="text-danger">Descripción:&nbsp</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{$perfil->descripcion}}</textarea>
                </div>

                @error('descripcion')
                    <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
                        {{$message}}
                    </div>
                @enderror

                <div class="mt-5 ">
                    <label for="url" class="text-danger">URL:&nbsp</label>
                    <input type="url" id="url" name="url" class="form-control" value="{{$perfil->url}}">
                </div>

                @error('url')
                    <div class="invalid-feedback d-block w-50 mx-auto" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
            
            
            <div class="col-12">
                <a href={{route('perfilShow',['perfil' => $perfil])}} class="btn btn-secondary"> VOLVER&nbsp
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-90deg-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                </svg>
                </a>

                <button type="submit" form="form-actualizar" class="btn float-right btn-success">
                    ACTIALIZAR&nbsp
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upload" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</form>
@endsection