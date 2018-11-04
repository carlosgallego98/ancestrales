<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificacionController extends Controller
{
    public function notificaciones(){
      return Auth::user()->unreadNotifications;
    }

    public function marcarLedido(Request $request){
      auth()->user()->unreadNotifications()->update(['read_at' => now()]);
      return "Listo";
    }
}
