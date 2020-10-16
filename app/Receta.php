<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'nombre', 'ingredientes', 'preparacion', 'imagen', 'categoria_id', 'user_id'
    ];

    public function categoria(){

        return $this->belongsTo(CategoriaReceta::class);
    }
    public function usuario(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
