<?php

namespace App\Http\Controllers;
use App\Receta;
use App\CategoriaReceta;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        $id = auth()->user()->id;
        $recetas = Receta::where('user_id', $id)->paginate(5);

        if(isset($_GET['storeNombre'])){
            
            $storeNombre = $_GET['storeNombre'];
            return view('recetas.index', compact('recetas', 'storeNombre'));

        }

        if(isset($_GET['updateNombre'])){
        
            $updateNombre = $_GET['updateNombre'];
            return view('recetas.index', compact('recetas', 'updateNombre'));

        }
        
        if(isset($_GET['deleteNombre'])){
        
            $deleteNombre = $_GET['deleteNombre'];
            return view('recetas.index', compact('recetas', 'deleteNombre'));

        }

        return view('recetas.index', compact('recetas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CategoriaReceta::all();
        return view('recetas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
      
        
        $data = $request->validate([
            'nombre' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
            'imagen' =>'required|image'
        ]);

        $imagen = $request['imagen']->store('upload-recetas', 'public');
        $img = Image::make(public_path("storage/{$imagen}"))->resize(800, 400);
        $img->save();

        Receta::create([
            'nombre' => $data['nombre'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $imagen,
            'categoria_id' => $data['categoria'],
            'user_id' => Auth::user()->id
        ]);
        $nombre = $data['nombre'];
        
        return redirect()->route('recetasIndex', ['storeNombre'=> $nombre]);        
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        $like = (auth()->user()) ? auth()->user()->like->contains($receta->id) : false;
        
        return view('recetas.show', compact('receta', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $this->authorize('update', $receta);
        $categorias = CategoriaReceta::all();
        return view('recetas.edit', compact('receta', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        $this->authorize('update', $receta);
        $data = $request->validate([
            'nombre' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
            'imagen' =>'image'
        ]);

        if($request['imagen'] != ''){
            $imagen = $request['imagen']->store('upload-recetas', 'public');
            $img = Image::make(public_path("storage/{$imagen}"))->resize(800, 400);
            $img->save();
            $receta->imagen = $imagen;
        }

        $receta->nombre = $request['nombre'];
        $receta->preparacion = $request['preparacion'];
        $receta->ingredientes = $request['ingredientes'];
        $receta->categoria_id = $request['categoria'];

        $receta->save();
        
        return redirect(route('recetasIndex', ['updateNombre'=> $receta->nombre]));
    }

    public function pdf(Receta $receta){


        $pdf = PDF::loadView('recetas.showPdf', compact('receta'));
        return $pdf->download("{$receta->nombre}.pdf");

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        $this->authorize('delete', $receta);
        $nombreReceta = $receta->nombre;
        $receta->delete();

        return redirect(route('recetasIndex', ['deleteNombre'=> $nombreReceta]));
        
    }
}
