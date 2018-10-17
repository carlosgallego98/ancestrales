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

Route::middleware(['auth:empleado,web','verified'])->group(
  function(){
    Route::get('/', 'HomeController@index')->name('inicio');
    Route::get('/perfil','UserController@index')->name('perfil');
    Route::post('/actualizar-avatar','UserController@actualizar_avatar');
    Route::post('/actualizar-perfil/{user}','UserController@update');
  });

  Auth::routes(['verify' => true]);
Route::group(['middleware'=>'guest','guard'=>'empleado,proveedor'],function(){
  Route::get('/login/empleados', 'Auth\EmpleadosLoginController@showLoginForm');
  Route::post('/login-empleados', 'Auth\EmpleadosLoginController@login');
  
  Route::get('/login/proveedores', 'Auth\ProveedoresLoginController@showLoginForm');
  Route::post('/login-proveedores', 'Auth\ProveedoresLoginController@login');
});


Route::group(['namespace'=> 'Admin'] , function(){
  Route::get('/panel','PanelController@redireccion')->name('panel');
  Route::get('/panel/perfil',function(){
    return "Perfil de Este man}";
  })->name('admin.perfil');
});

Route::group(
    [
     'middleware' => ['auth:empleado','role:gerente'],
    ],function(){
      Route::group(['namespace'=> 'Admin'],function(){
         Route::get('/gerente','GerenteController@gerente')->name('gerente');
         Route::get('estadisticas/ventas','GerenteController@estadisticas_ventas')->name('estadisticas.ventas');
         Route::get('estadisticas/pedidos','GerenteController@estadisticas_pedidos')->name('estadisticas.pedidos');
      });

      Route::get('empleados','EmpleadoController@index')->name('empleados');
      Route::get('pedidos/autorizar/{pedido_proveedor}','PedidoController@autorizar')->name('pedido.autorizar');
      Route::get('pedidos/en-camino','PedidoController@en_camino')->name('pedidos.camino');
      Route::get('pedidos/por-confirmar','PedidoController@por_confirmar')->name('pedidos.confirmar');
      Route::get('empleados/registar','EmpleadoController@create')->name('empleados.nuevo');
      Route::post('empleados/registar/store','EmpleadoController@store')->name('empleados.store');
  });

Route::group(
    [
     'middleware' => ['auth:empleado','role:produccion']
    ],function(){
       Route::group(['namespace'=> 'Admin'],function(){
          Route::get('/area-produccion','ProduccionController@produccion')->name('produccion');
          Route::get('/pedido/proveedor','ProduccionController@pedidos_proveedor')->name('produccion.reabastecer');
       });
        Route::get('/materia-prima/registrar','MateriaPrimaController@create')->name('materia_prima.nuevo');
        Route::post('/materia-prima/registrar','MateriaPrimaController@store')->name('materia_prima.store');
        Route::get('/materia-prima/{tipo}','MateriaPrimaController@index')->name('materia_prima');
   });

Route::group(
  ['namespace'=> 'Admin',
   'middleware' => ['auth:empleado','role:despacho']
  ],
  function(){
    Route::get('/area-despacho','DespachoController@despacho')->name('despacho');

});

Route::group(
  ['middleware' => ['auth:proveedor','role:proveedor']],
  function(){
    Route::group(['namespace'=> 'Admin',],function(){
      Route::get('/proveedores','ProveedorController@proveedor')->name('proveedor');
    });
    Route::get('/proveedores/pedidos','ProveedorController@pedidos')->name('proveedor.pedidos');
    Route::get('/proveedores/pedido/confirmar/{pedido}','ProveedorController@confirmar_pedido');

});

Route::group(
  ['namespace'=> 'Admin',
   'middleware' => ['auth:empleado','role:relaciones_publicas']
  ],
  function(){
    Route::get('/relaciones-publicas','RelacionesController@relaciones')->name('relaciones');

});

Route::group(['prefix'=> 'datatables'],
  function(){

    Route::get('users','UserController@datatable');
    Route::get('empleados','EmpleadoController@datatable');
    Route::get('pedidos/proveedores','ProveedorController@pedidos_datatable');
    Route::get('materia_prima/{proveedor}','MateriaPrimaController@datatable_proveedor');   
    Route::get('materia_prima/{tipo}','MateriaPrimaController@datatable');
    Route::get('pedidos/{tabla}/{tipo}','PedidoController@datatable');    
//     Route::get('ventas',function(){});
  });