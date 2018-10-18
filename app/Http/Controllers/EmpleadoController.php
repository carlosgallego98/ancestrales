<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Empleado;
use Storage;
Use Image;
use Hash;
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
        ->where('name','!=','proveedor')
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
        $data = $request->toArray();
        
        $nombre_spit = str_split($data['nombres']);
        $apellido_split = str_split($data['apellidos']);
        $correo_split = explode('@',$data['email']);

        $contraseña = 
        str_replace('-','',"{$nombre_spit[0]}{$data['cedula']}{$apellido_split[0]}");
        
        $nombre_usuario = $correo_split[0];
        
        $usuario = Empleado::create([
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'nombre_usuario' => $nombre_usuario,
            'genero' => $data['genero'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'password' => Hash::make($contraseña),
            'email_verified_at' => date('yyyy-mm-dd'),
        ]);

        $role = Role::findById($data['rol']);
        $usuario->assignRole($role);

        $request->session()->flash('alert-success', $data["nombres"].' registrado Satisfactoriamente');
        
        return redirect()->route('empleados');
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
        $user->email = $request['email'];
        $user->direccion = $request['direccion'];
        $user->save();

        $request->session()->flash('alert-success', 'Datos Actualizados!');
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
        ->select('nombres','apellidos','direccion','email','cedula','users.created_at','roles.name')
        ->role(['produccion','despacho','relaciones_publicas'])
        ->get();
        
        return datatables()->of($users)
        ->editColumn('created_at',function($user){
            return $user->created_at->format('Y-m-d');
        })->toJson();
    }
}
