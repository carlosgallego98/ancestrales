<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
{
    public function proveedor()
      {
        return view('admin.proveedor.panel');
      }
}
