<?php

namespace App\Http\Controllers;

use Alert;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = \App\Proveedor::all();
        $materiales = \App\MateriaPrima::all();
        return view('admin.productos.create',compact('proveedores','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->toArray();

      if($request->hasFile('img_producto')) {
                  $extension = $request->file('img_producto')->getClientOriginalExtension();
                  $fileNameToStore = str_slug($data["nombre"]).'_'.time().'.'.$extension;
                  $img = \Image::make($request->file('img_producto'))->fit(300);
                  \Storage::disk('imagen_productos')->put($fileNameToStore, $img->stream('jpg',100));
        } else { $fileNameToStore = 'default.jpg';}

      $producto = Producto::create([
        'img_producto' => $fileNameToStore,
        'nombre'=> $data["nombre"],
        'precio'=> $data["precio"],
        'descripcion'=> $data["descripcion"],
        'url'=> str_slug($data["nombre"],'-'),
      ]);

      $producto->materiales()->sync($data['ingredientes']);

      alert()->success('Exito', "{$data["nombre"]} registrado satisfactoriamente");
      return redirect()->route('inventario.productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('admin.productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
