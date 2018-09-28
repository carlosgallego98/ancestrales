<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GerenteController extends Controller
{
    public function gerente()
    {
      return view('admin.gerente.panel');
    }
}
