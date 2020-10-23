<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    
    public function update(Request $request, Receta $receta)
    {
        auth()->user()->like()->toggle($receta);

        return redirect(route('recetasShow', ['receta' => $receta]));
    }

}
