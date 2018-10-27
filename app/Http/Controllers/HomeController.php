<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio');
    }

    public function productos()
    {
      $bebidas = Producto::paginate(10);
      return view('productos',compact('bebidas'));
    }

    public function ver_bebida(Producto $producto)
    {
      return $producto;
    }
}
