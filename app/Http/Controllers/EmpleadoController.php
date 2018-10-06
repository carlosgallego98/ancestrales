<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Empleado;
use Storage;
Use Image;
use Auth;
use DB;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gerente.empleados',compact('empleados'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name','!=','gerente')
        ->where('name','!=','comprador')
        ->get();

        return view('admin.gerente.empleados.nuevo',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
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
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
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

    public function datatable()
    {
        $users = Empleado::join('model_has_roles','model_has_roles.model_id','=','users.id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->select('nombres','apellidos','direccion','correo','cedula','users.created_at','roles.name')
        ->role(['produccion','despacho','proveedor','relaciones_publicas'])
        ->get();
        
        return datatables()->of($users)
        ->editColumn('created_at',function($user){
            return $user->created_at->format('Y-m-d');
        })->toJson();
    }
}
