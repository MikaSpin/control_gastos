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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuarios','UsuariosController@index')->name('usuarios');
Route::get('/categorias','CategoriasController@index')->name('categorias');
Route::get('/categorias/create','CategoriasController@create')->name('categorias.create');
Route::get('/categorias/edit/{cat_id}','CategoriasController@edit')->name('categorias.edit');
Route::get('/usuarios/create','UsuariosController@create')->name('usuarios.create');

Route::Post('/categorias/store','CategoriasController@store')->name('categorias.store');

Route::Post('/usuarios/store','UsuariosController@store')->name('usuarios.store');