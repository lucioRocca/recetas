<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_recetas')->insert([
            'categoria'=> 'categoria 1',
        ]);

        DB::table('categoria_recetas')->insert([
            'categoria'=> 'categoria 2',
        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 1',
            'ingredientes'=> 'Pan, Leche, Huevo, Azucar',
            'imagen'=> 'img1.jpg',
            'preparacion'=> 'batir 1',
            'user_id'=> 1,
            'categoria_id'=> 1
        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 2',
            'ingredientes'=> 'Leche, Huevo, Azucar',
            'imagen'=> 'img1.jpg',
            'preparacion'=> 'batir 2',
            'user_id'=> 1,
            'categoria_id'=> 2
        
        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 3',
            'ingredientes'=> 'Huevo, Azucar',
            'imagen'=> 'img1.jpg',
            'preparacion'=> 'batir 3',
            'user_id'=> 2,
            'categoria_id'=> 1

        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 4',
            'ingredientes'=> 'Azucar',
            'imagen'=> 'img1.jpg',
            'preparacion'=> 'batir 4',
            'user_id'=> 1,
            'categoria_id'=> 1

        ]);
    
    }
}
