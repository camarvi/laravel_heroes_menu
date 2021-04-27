<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nuevo', function(){
    return view('heroes.heroesform');
})->name('nuevo');

Route::post('save', 'HeroesController@store')->name('save');

Route::get('/listado', 'HeroesController@getAll')->name('listado');

Route::get('/buscar', function(){
    return view('heroes.buscarheroe');
})->name('buscar');

Route::get('/mostrar', 'heroesController@buscarNombre')->name('mostrar');

Route::delete('/eliminar/{id}', 'heroesController@destroy')->name('eliminar');

Route::get('/editar/{id}','heroesController@editForm')->name('editform');

Route::patch('/edit/{id}', 'heroesController@update')->name('update');