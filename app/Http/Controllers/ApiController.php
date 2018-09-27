<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ApiController extends Controller
{
    public function productos(){
        return Producto::all();
    }
}
