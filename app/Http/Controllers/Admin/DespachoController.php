<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DespachoController extends Controller
{
    public function despacho()
    {
      return view('admin.despacho.panel');
    }
}
