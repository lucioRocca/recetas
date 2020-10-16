<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RedirectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RecetaController@index');

Auth::routes();

Route::get('/recetas', 'RecetaController@index')->name('recetasIndex');
Route::get('/recetas/create', 'RecetaController@create')->name('recetasCreate');
Route::post('/recetas', 'RecetaController@store')->name('recetasStore');
Route::get('/recetas/{receta}', 'RecetaController@show')->name('recetasShow');
Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('recetasEdit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('recetasUpdate');
Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetasDestroy');
