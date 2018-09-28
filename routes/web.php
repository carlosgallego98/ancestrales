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

Route::group(['namespace'=> 'Admin'] , function(){
  Route::get('/panel','AdminController@panel')->name('panel');
});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'gerencia',
   'middleware' => 'role:gerente'
  ],function(){
    Route::get('/','PanelController@gerente')->name('gerente');
});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'area-despacho',
   'middleware' => 'role:produccion|despacho'
  ],function(){
    Route::get('/','PanelController@produccion')->name('produccion');

});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'area-produccion',
   'middleware' => 'role:produccion|despacho'
  ],function(){
    Route::get('/','PanelController@despacho')->name('despacho');

});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'proveedor',
   'middleware' => 'role:proveedor'
  ],function(){
    Route::get('/','PanelController@proveedor')->name('proveedor');

});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'relaciones-publicas',
   'middleware' => 'role:relaciones_publicas'
  ],function(){
    Route::get('/','PanelController@relaciones')->name('relaciones');

});

Auth::routes();

Route::get('/', 'HomeController@index')->name('inicio');

Route::get('/productos','ApiController@productos');

Route::middleware('auth')->group(function(){
  Route::get('/perfil','UserController@index')->name('perfil');
  Route::post('/actualizar-avatar','UserController@actualizar_avatar');
  Route::post('/actualizar-perfil/{user}','UserController@update');
});
