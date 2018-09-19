@extends('layouts.auth')

@section('formulario')
<form method="POST" class="card" action="{{ route('register') }}">
    @csrf

    <div class="text-center">
        <div class="login-logo">
            <img src="./img/logo.png" alt="Bebidas Típicas Cristina Lozano">
        </div>
        <h3 class="h3-responsive font-weight-bold">
            Registro
        </h3>
    </div>
    <hr>
    <div class="card-body pt-1 px-sm-5">
        <div class="form-row">
            <div class="md-form col-md-6">
                <label for="nombres">Nombres</label>
                <input class="form-control" type="text" name="nombres" id="nombres">
            </div>
            <div class="md-form col-md-6">
                <label for="apellidos">Apellidos</label>
                <input class="form-control" type="text" name="apellidos" id="apellidos">
            </div>
        </div>

        <div class="form-row">
            <div class="md-form col-md-6">
                <label for="telefono">Teléfono</label>
                <input class="form-control" type="text" name="telefono" id="telefono">
            </div>
            <div class="md-form col-md-6">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input class="form-control" type="text" name="fecha_nacimiento" id="fecha_nacimiento">
            </div>
        </div>


        <div class="form-row">
            <div class="md-form col-md-6">
                <label for="direccion">Direccion</label>
                <input class="form-control" type="text" name="direccion" id="direccion">
            </div>
            <div class="md-form col-md-6">
                <label for="correo">Correo Electrónico</label>
                <input class="form-control" type="text" name="correo" id="correo">
            </div>
        </div>

        <div class="form-row">
                <div class="md-form col-md-6">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>
                <div class="md-form col-md-6">
                        <label for="password-confirm">Confirmacion Contraseña</label>
                        <input class="form-control" type="text" name="password-confirm" id="password-confirm">
                    </div>
            </div>
        <div class="form-row justify-content-center">
                <input type="submit" value="Registrarme" class="btn btn-outline-primary">
        </div>


</form>
@endsection
