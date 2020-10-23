<?php

namespace App\Http\Controllers;

use App\Receta;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    
    public function update(Request $request, Receta $receta)
    {
        auth()->user()->like()->toggle($receta);

        return redirect(route('recetasShow', ['receta' => $receta]));
    }


}
