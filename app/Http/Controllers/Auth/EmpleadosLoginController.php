<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmpleadosLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLoginForm()
    {
        return view('auth.empleados');
    }

    public function login(Request $request)
    {
    	$this->validate($request,[
    		'cedula' =>'required',
    		'password' => 'required|min:5'
        ]);

    	if (Auth::guard('empleado')->attempt(['cedula' => $request->cedula,'password' => $request->password])){
    		return redirect()->intended(route('panel'));
        }
    	return redirect()->back()->withInput($request->only('cedula','remember'));
    }
}
