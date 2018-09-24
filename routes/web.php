<?php

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

Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function(){
  Route::get('/','AdminController@escritorio')->name('escritorio');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('inicio');

Route::middleware('auth')->group(function(){
  Route::get('/perfil','UserController@index')->name('perfil');
  Route::post('/actualizar-avatar','UserController@actualizar_avatar');
  Route::post('/actualizar-perfil/{user}','UserController@update');

});
