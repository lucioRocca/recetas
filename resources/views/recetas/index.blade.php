@extends('layouts.app')

@section('content')

    <table class="table container">
        <thead class="thead-dark">
        <tr class="text-center row">
            <th scope="col" class="col">#</th>
            <th scope="col" class="col">Nombre</th>
            <th scope="col" class="col">Categoria</th>
            <th scope="col" class="col">Accion</th>
        </tr>
        </thead>
        <tbody>            
            @php
                $i=0
            @endphp
            @foreach ($recetas as $receta)
            <tr class="text-center row">
                @php
                    $i = $i+1
                @endphp

                <th scope="row" class="col">{{$i}}</th>
                <td class="col">{{$receta->nombre}}</td>
                <td class="col">{{$receta->categoria->categoria}}</td>
                <td class="col">
                    <a href={{route('recetasShow', ['receta' => $receta]) }} class="btn btn-success w-100">Ver</a>
                    <a href={{route('recetasEdit', ['receta' => $receta]) }} class="btn btn-secondary w-100">Editar</a>
                    <form action={{route('recetasDestroy', ['receta' => $receta])}} method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger w-100" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
     @php
        if(isset($storeNombre)){
            $html = "<div class='alert alert-success w-50 mx-auto text-center' role='alert'>La Receta ''". $storeNombre ."'' se agrego correctamente</div>";
            echo $html;
        }
        if(isset($updateNombre)){
            $html = "<div class='alert alert-secondary w-50 mx-auto text-center' role='alert'>La Receta ''". $updateNombre ."'' se modifico correctamente</div>";
            echo $html;
        }
        if(isset($deleteNombre)){
            $html = "<div class='alert alert-danger w-50 mx-auto text-center' role='alert'>La Receta ''". $deleteNombre ."'' se elimino correctamente</div>";
            echo $html;
        }
     @endphp
     
     <div class= "row">
        <a class='btn btn-outline-dark w-25 mx-auto' href={{route('recetasCreate')}}>Añadir Nueva Receta</a>
    </div>
@endsection