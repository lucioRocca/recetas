<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;

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
      return view('principal.index', compact('nuevas'));
    }
}
