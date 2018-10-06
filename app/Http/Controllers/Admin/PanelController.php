<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
        
      public function redireccion()
      {
        foreach (auth('empleado')->user()->rol() as $rol) {
          switch ($rol) {
            case 'gerente':
              return redirect()->route('gerente');
              break;
  
              case 'produccion':
              return redirect()->route('produccion');            
              break;
              
              case 'despacho':
              return redirect()->route('despacho');
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
}
