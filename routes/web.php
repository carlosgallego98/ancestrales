<?php
Route::get('/', 'HomeController@index')->name('inicio');

Auth::routes(['verify' => true]);

Route::group(['middleware'=>'guest','guard'=>'empleado,proveedor'], function () {
    Route::get('/login/empresa', 'Auth\EmpleadosLoginController@showLoginForm');
    Route::post('/login-empleados', 'Auth\EmpleadosLoginController@login');
    Route::get('/login/proveedores', 'Auth\ProveedoresLoginController@showLoginForm');
    Route::post('/login-proveedores', 'Auth\ProveedoresLoginController@login');
});

Route::group(['namespace'=> 'Admin'], function () {
    Route::get('/panel', 'PanelController@redireccion')->name('panel');
});

Route::group(['middleware' => ['auth:empleado','role:gerente']], function () {

    Route::group(['namespace'=> 'Admin'], function () {
            Route::get('/gerente', 'GerenteController@gerente')->name('gerente');
            Route::get('estadisticas/ventas', 'GerenteController@estadisticas_ventas')->name('estadisticas.ventas');
            Route::get('estadisticas/pedidos', 'GerenteController@estadisticas_pedidos')->name('estadisticas.pedidos');
        });

        Route::get('empleados', 'EmpleadoController@index')->name('empleados');
        Route::get('pedidos/autorizar/{pedido_proveedor}', 'PedidoProveedorController@autorizar')->name('pedido.autorizar');
        Route::get('pedidos/en-camino', 'PedidoProveedorController@en_camino')->name('pedidos.camino');
        Route::get('pedidos/por-confirmar', 'PedidoProveedorController@por_confirmar')->name('pedidos.confirmar');
        Route::get('empleados/registar', 'EmpleadoController@create')->name('empleados.nuevo');
        Route::post('empleados/registar/store', 'EmpleadoController@store')->name('empleados.store');
    }
);

Route::group(['middleware' => ['auth:empleado','role:produccion']], function () {
        Route::group(['namespace'=> 'Admin'], function () {
            Route::get('/area-produccion', 'ProduccionController@produccion')->name('produccion');
            Route::get('{pedido}/elaboracion','ProduccionController@FormElaboracion')->name('pedido.elaboracion');
            Route::post('{pedido}/elaboracion','ProduccionController@ProductoElaborado')->name('pedido.elaborado');
            Route::post('/registrar-elaboracion','ProduccionController@RedirectElaboracion');
        });
    }
);

Route::group(['middleware'=> 'auth:empleado','role:almacenamiento'], function(){
  Route::group(['namespace'=> 'Admin'],function(){
    Route::get('/bodega-almacenamiento','AlmacenamientoController@almacenamiento')->name('almacenamiento');
    Route::post('actualizar/inventario/modal','AlmacenamientoController@modal_actualizar_inventario');
    Route::get('/actualizar/inventario/{pedido_proveedor}','AlmacenamientoController@actualizar_inventario')->name('almacenamiento.actualizar');
    Route::get('/pedido/proveedor','AlmacenamientoController@pedidos_proveedor')->name('produccion.reabastecer');
  });

  Route::get('/materia-prima/registrar', 'MateriaPrimaController@create')->name('materia_prima.nuevo');
  Route::post('/materia-prima/registrar', 'MateriaPrimaController@store')->name('materia_prima.store');
  Route::post('/materia-prima/actualizar', 'MateriaPrimaController@update')->name('materia_prima.update');
  Route::get('/materia-prima/{tipo}', 'MateriaPrimaController@index')->name('materia_prima');
});

Route::group(['namespace'=> 'Admin','middleware' => ['auth:empleado','role:despacho']], function () {
      Route::get('/area-despacho', 'DespachoController@despacho')->name('despacho');
  }
);

Route::group(['middleware' => ['auth:proveedor','role:proveedor']],function () {
      Route::group(['namespace'=> 'Admin',], function () {
          Route::get('/proveedores', 'ProveedorController@proveedor')->name('proveedor');
      });
      Route::get('/proveedores/pedidos', 'ProveedorController@pedidos')->name('proveedor.pedidos');
      Route::get('/proveedores/pedido/confirmar/{pedido}', 'ProveedorController@confirmar_pedido');
  }
);

Route::group(['namespace'=> 'Admin', 'middleware' => ['auth:empleado','role:relaciones_publicas']],function () {
      Route::get('/relaciones-publicas', 'RelacionesController@relaciones')->name('relaciones');
  }
);

Route::group(['middleware'=> 'auth:empleado',],function(){
  Route::get('/notificaciones','NotificacionController@notificaciones')->name('user.notificaciones');
  Route::post('/notificaciones/marcar-todo','NotificacionController@marcarLedido');

  Route::get('/pedidos-provedor','PedidoProveedorController@index')->name('pedidos.proveedores');
  Route::get('/pedidos-bebidas','PedidoController@index')->name('pedidos.bebidas');
  Route::get('/pedidos-bebidas/{pedido}/detalles','PedidoController@show')->name('pedidos.bebidas.detalles');

  Route::get('/inventario/productos','ProductoController@index')->name('inventario.productos');
  Route::get('/inventario/productos/registrar','ProductoController@create')->name('inventario.productos.registrar');
  Route::get('/inventario/productos/{producto}/detalles','ProductoController@show')->name('inventario.productos.detalles');
  Route::post('/inventario/productos/registrar','ProductoController@store');


});

Route::middleware(['auth:empleado,web','verified'])->group(
  function () {
      Route::get('/perfil', 'UserController@index')->name('perfil');
      Route::post('/actualizar-avatar', 'UserController@actualizar_avatar');
      Route::post('/actualizar-perfil/{user}', 'UserController@update');
      Route::get('/bebidas','HomeController@productos')->name('productos');
      Route::get('/{bebida}','HomeController@ver_bebida')->name('productos.detalles');
      Route::get('/bebida/{bebida}/pedido','PedidoController@create')->name('productos.pedido');
      Route::get('/bebida/{pedido}/confirmar','PedidoController@confirmar');
      Route::get('/bebida/{pedido}/cancelar','PedidoController@destroy');
      Route::post('/bebida/pedido','PedidoController@store')->name('productos.pedido.realizar');
    }
);

Route::group(['prefix'=> 'datatables'],function () {
      Route::get('users', 'UserController@datatable');
      Route::get('empleados', 'EmpleadoController@datatable');
      Route::get('pedidos/proveedores', 'PedidoProveedorController@datatable');
      Route::get('materia_prima/{tipo}', 'MateriaPrimaController@datatable');
      Route::get('materia_prima/{proveedor}', 'MateriaPrimaController@datatable_proveedor');
//    Route::get('pedidos/{tabla}/{tipo}', 'PedidoController@datatable');
//    Route::get('ventas',function(){});
  }
);
