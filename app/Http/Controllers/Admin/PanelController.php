<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
        
      public function gerente(){
        return view('admin.panel.gerente');
      }
  
      public function despacho(){
        return view('admin.panel.despacho');
      }

      public function produccion(){
        return view('admin.panel.produccion');
      }
  
      public function proveedor(){
        return view('admin.panel.proveedor');
      }
  
      public function relaciones(){
        return view('admin.panel.relacion');
      }
}
