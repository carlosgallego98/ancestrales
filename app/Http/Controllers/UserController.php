<?php

namespace App\Http\Controllers;

use App\User;
Use Image;
use Storage;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil');
    }

    public function actualizar_avatar(Request $request)
    {
        $usuario = Auth::user();
        $imagen = $request->file('input-imagen');
        $ajuste = Image::make($imagen)->fit(300)->encode('jpg');
        $hash = md5($ajuste->__toString()); 
        $id_usuario = $usuario->id;  
        $directorio = "fotos_perfil/{$id_usuario}_{$hash}.jpg";
    
        if (Storage::disk('subidas')->put( $directorio, $ajuste)) {
            $usuario->foto_perfil = "{$id_usuario}_{$hash}.jpg";
            return back()->with('success','Imagen de Perfil Cambiada');
        } else {
            # code...
        }
        
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
