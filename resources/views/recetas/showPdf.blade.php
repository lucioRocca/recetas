<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t25EcRE3e/ihU5zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Receta Pdf</title>
</head>
<body>
        <div class="d-block justify-content-center">
            <div class="text-center">
                <h1 class="text-dark">{{$receta->nombre}}</h1>
            </div>
    
    
            <div class="mt-5 ">
                <div class="ml-5">
                    <h5 class="text-danger ">Categoria:</h5>
                    {{$receta->categoria->categoria}}
                </div>
            </div>
    
    
            <div class="mt-5">
    
                <div class="ml-5">
                    <h5 class="text-danger">Ingredientes:</h5>
                    {!! $receta->ingredientes !!}
                </div>
    
            </div>
            
    
            <div class="mt-5">
    
                <div class="ml-5">
                    <h5 class="text-danger">Preparacion:</h5>
                    {!! $receta->preparacion !!}
                </div>
    
            </div>
            
        </div>
</body>
</html>


