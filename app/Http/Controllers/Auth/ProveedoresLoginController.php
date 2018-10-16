<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProveedoresLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/proveedores';

    public function __construct(){
        $this->middleware('guest');
    }
    
    public function showLoginForm(){
        return view('auth.proveedor');
    }

    public function username(){
        return 'nit';
    }

    public function login(Request $request){
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request){
        $this->validate($request, [
            $this->username() => 'required|integer',
            'password' => 'required|string',
        ]);
    }

    protected function sendLoginResponse(Request $request){
        $request->session()->regenerate();

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended(route('/proveedores'));
    }

        public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


    protected function guard(){
        return Auth::guard('proveedor');
    }
}
