<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\EmpresaTransporte;

class PanelController extends Controller
{
      public function _construct()
      {
        $this->middleware("auth:empleado");
      }

      public function redireccion()
      {
        if (auth("empleado")->check()) {
          foreach (auth('empleado')->user()->rol() as $rol) {
            switch ($rol) {
              case 'gerente':
                return redirect()->route('gerente');
                break;
  
                case 'produccion':
                return redirect()->route('produccion');
                break;
  
                case 'almacenamiento':
                return redirect()->route('almacenamiento');
                break;
  
                case 'despacho':
                return redirect()->route('despacho');
                break;
  
                case 'relaciones':
                return redirect()->route('relaciones');
                break;
  
                default:
                return redirect()->route('inicio');
                break;
            }
          }
        }else{
          return redirect("/login/empresa");
        }
      }

      public function empresasTransporte(EmpresaTransporte $empresa){
        return $empresa->toJson();
      }
}
