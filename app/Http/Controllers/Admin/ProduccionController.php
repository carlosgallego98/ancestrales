<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduccionController extends Controller
{
    public function produccion()
      {
        return view('admin.produccion.panel');
      }
}
