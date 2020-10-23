<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $nuevas = Receta::orderBy('created_at', 'DESC')->paginate(3);

      $categorias = CategoriaReceta::all();
      
      $recetasCategorias = array();

      foreach($categorias as $categoria){

        $recetasCategorias[$categoria->categoria] = Receta::where('categoria_id', $categoria->id)->paginate(1, ['*'] , Str::slug($categoria->categoria));

      }
      $recetaslike = Auth::user()->like()->paginate(2, ['*'] , 'like');

      return view('principal.index', compact('nuevas', 'recetasCategorias', 'recetaslike'));
    }
}
