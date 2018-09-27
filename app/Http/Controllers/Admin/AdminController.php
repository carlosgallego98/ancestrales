<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function panel(){
      foreach (auth()->user()->rol() as $rol) {
        switch ($rol) {
          case 'gerente':
            return redirect()->route('gerente');
            break;

            case 'produccion':
            case 'despacho':
            return redirect()->route('produccion');
            break;

            case 'relaciones':
            return redirect()->route('relaciones');
            break;

            case 'proveedor':
            return redirect()->route('proveedor');
            break;
            
            default:
            return redirect()->route('inicio');
            break;
        }
      }
    }
    
    public function gerente(){
      return view('admin.gerente');
    }

    public function produccion_despacho(){
      return view('admin.produccion_despacho');
    }

    public function proveedor(){
      return view('admin.proveedor');
    }

    public function relaciones(){
      return view('admin.relacion');
    }

}
