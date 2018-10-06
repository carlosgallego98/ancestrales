@extends('layouts.admin')

@section('titulo','Registar')
@section('subtitulo','Empleado')

@section('contenido')
<div class="row justify-content-center">
    {{-- form --}}
    <div class="col-md-8" style="float: none;margin: 0 auto;">
        <div class="box box-body box-solid">
            <div class="box-header">
                <h3 class="box-title">Detalles</h3>
            </div>

            <form action="{{ route('empleados.store') }}" id="empleados-form" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombreInput">Nombres</label>
                        <input type="text" class="form-control" id="nombreInput" placeholder="ej: Pedro" name="nombres" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="apellidosInput">Apellidos</label>
                        <input type="text" class="form-control" id="apellidosInput" placeholder="ej: Perez" name="apellidos" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="correoInput">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correoInput" placeholder="pedroperez@despacho.com"
                            name="correo" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cedulaInput">Cedula</label>
                        <input type="text" class="form-control" id="cedulaInput" placeholder="xxxx-xxx-xxx" name="cedula" required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="fechaNacimientoInput">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" id="fechaNacimientoInput" placeholder="Año-Mes-Dia" name="fecha_nacimiento" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="selectGenero">Genero</label>
                        <select class="form-control" name="genero" name="selectGenero">
                            <option value="n">Selecciona</option>
                            <option value="f">Femenino</option>
                            <option value="m">Masculino</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="selectGenero">Rol</label>
                        <select class="form-control text-capitalize" name="rol">
                                <option value="0">Selecciona</option>
                            @foreach ($roles as $rol)
                                <option value="{{$rol->id}}">{{$rol->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="box box-body box-solid">
            <input type="submit" form="empleados-form" class="btn btn-primary pull-right" value="Guardar">
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="/adminlte/plugins/inputmask/jquery.inputmask.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.date.extensions.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.extensions.js"></script>

<script>
    $('#fechaNacimientoInput').inputmask('yyyy-mm-dd')
    $('#cedulaInput').inputmask('9999-999-999')
</script>
@endpush
