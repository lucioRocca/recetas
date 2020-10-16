<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert([
            'descripcion'=> 'Chico guapo',
            'imagen'=> 'img1.jpg',
            'url'=> 'ww.jaja.com',
            'user_id'=> 1,
        ]);

        DB::table('perfils')->insert([
            'descripcion'=> 'Chico guapo2',
            'imagen'=> 'img2.jpg',
            'url'=> 'ww.jaja2.com',
            'user_id'=> 2,
        ]);
    }
}
