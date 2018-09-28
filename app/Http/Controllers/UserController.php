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
        return view('perfil.detalles');
    }

    public function actualizar_avatar(Request $request)
    {
        $usuario = Auth::user();
        $imagen = $request->file('input-imagen');
        $image_ajustada = Image::make($imagen)->fit(300)->encode('jpg');
        $nombre_archivo = "avatar_{$usuario->id}_".time().".jpg";
        $directorio = "usuario_{$usuario->id}_{$usuario->created_at->format('dmy')}/foto_perfil/{$nombre_archivo}";
    
        if (Storage::disk('subidas')->put( $directorio, $image_ajustada)) {
            $usuario->foto_perfil = $nombre_archivo;
            $usuario->save();

            $request->session()->flash('alert-success', 'Foto de perfil actualizada!');
            return redirect()->back();

        } else {
            $request->session()->flash('alert-danger', 'Hubo un error!');
            return redirect()->back();
        }
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
        $user->nombres = $request['nombres'];
        $user->apellidos = $request['apellidos'];
        $user->correo = $request['correo'];
        $user->direccion = $request['direccion'];
        $user->save();

        $request->session()->flash('alert-success', 'Has actualizado tu perfil!');
        return redirect()->back();
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
