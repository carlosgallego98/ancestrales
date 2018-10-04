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
  Route::get('/panel','PanelController@redireccion')->name('panel');
});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'gerencia',
   'middleware' => 'role:gerente'
  ],function(){
    Route::get('/','GerenteController@gerente')->name('gerente');

    Route::get('/empleados','GerenteController@empleados')->name('empleados');

    Route::get('estadisticas/ventas','GerenteController@estadisticas_ventas')->name('estadisticas.ventas');
    
    Route::get('estadisticas/pedidos','GerenteController@estadisticas_pedidos')->name('estadisticas.pedidos');
});

Route::group(['prefix'=> 'datatables'],function(){
  Route::get('users','UserController@datatable');
  Route::get('ventas',function(){});
  Route::get('pedidos',function(){});
});


Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'area-despacho',
   'middleware' => 'role:produccion'
  ],function(){
    Route::get('/','ProduccionController@produccion')->name('produccion');

});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'area-produccion',
   'middleware' => 'role:despacho'
  ],function(){
    Route::get('/','DespachoController@despacho')->name('despacho');

});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'proveedores',
   'middleware' => 'role:proveedor'
  ],function(){
    Route::get('/','ProveedorController@proveedor')->name('proveedor');

});

Route::group(
  ['namespace'=> 'Admin',
   'prefix' => 'relaciones-publicas',
   'middleware' => 'role:relaciones_publicas'
  ],function(){
    Route::get('/','RelacionesController@relaciones')->name('relaciones');

});

Auth::routes();

Route::get('/', 'HomeController@index')->name('inicio');

Route::middleware('auth')->group(function(){
  Route::get('/perfil','UserController@index')->name('perfil');
  Route::post('/actualizar-avatar','UserController@actualizar_avatar');
  Route::post('/actualizar-perfil/{user}','UserController@update');
});
