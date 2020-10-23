<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
   
    public function show(Perfil $perfil)
    {
        return view('perfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('update', $perfil);
        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->authorize('update', $perfil);

        $data = $request->validate([
            'imagen' =>'image',
            'descripcion' => 'nullable',
            'url' => 'nullable|url'
        ]);

        if($request['imagen'] != ''){
            $imagen = $request['imagen']->store('upload-perfil', 'public');
            $img = Image::make(public_path("storage/{$imagen}"))->resize(500, 500);
            $img->save();
            $perfil->imagen = $imagen;
        }
        $perfil->descripcion = $data['descripcion'];
        $perfil->url = $data['url'];
        $perfil->save();

        return redirect(route('perfilShow', ['perfil' => $perfil]));
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
