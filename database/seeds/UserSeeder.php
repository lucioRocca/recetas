<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'lucio 1',
            'email'=> 'lucio1@gmail.com',
            'password'=> Hash::make('1234'),
        ]);
        DB::table('users')->insert([
            'name'=> 'lucio 2',
            'email'=> 'lucio2@gmail.com',
            'password'=> Hash::make('1234'),
        ]);
    }
}
