<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RelacionesController extends Controller
{
    public function relaciones()
      {
        return view('admin.relacion.panel');
      }
}
