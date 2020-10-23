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
            'imagen'=> 'upload-recetas/6yi4rgH0o8x4ZvOH1IAZKSJnRKYbFGCqTxuFv7Sh.jpeg',
            'preparacion'=> 'batir 1',
            'user_id'=> 1,
            'categoria_id'=> 1
        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 2',
            'ingredientes'=> 'Leche, Huevo, Azucar',
            'imagen'=> 'upload-recetas/6yi4rgH0o8x4ZvOH1IAZKSJnRKYbFGCqTxuFv7Sh.jpeg',
            'preparacion'=> 'batir 2',
            'user_id'=> 1,
            'categoria_id'=> 2
        
        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 3',
            'ingredientes'=> 'Huevo, Azucar',
            'imagen'=> 'upload-recetas/6yi4rgH0o8x4ZvOH1IAZKSJnRKYbFGCqTxuFv7Sh.jpeg',
            'preparacion'=> 'batir 3',
            'user_id'=> 2,
            'categoria_id'=> 1

        ]);

        DB::table('recetas')->insert([
            'nombre'=> 'receta 4',
            'ingredientes'=> 'Azucar',
            'imagen'=> 'upload-recetas/6yi4rgH0o8x4ZvOH1IAZKSJnRKYbFGCqTxuFv7Sh.jpeg',
            'preparacion'=> 'batir 4',
            'user_id'=> 1,
            'categoria_id'=> 1

        ]);
    
    }
}
