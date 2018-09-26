@extends('layouts.auth')
@section('titulo','Registro')
@section('formulario')
<div class="col-md-6">
    <form method="POST" class="card" action="{{ route('register') }}">
        @csrf
        <div class="text-center">
            <div class="login-logo">
                <a href="{{ route('inicio') }}" title="Ir al Inicio">
                    <img src="./img/logo.png" alt="Bebidas Típicas Cristina Lozano">
                </a> </div>
            <h3 class="h3-responsive font-weight-bold">
                Registro
            </h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger text-center">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <div class="card-body p-2 px-5">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="md-form">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required value="{{ old('nombres') }}">
                        <div class="invalid-feedback">Example invalid feedback text</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required value="{{ old('apellidos') }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="md-form col-md-8">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required value="{{ old('correo') }}">
                </div>
                <div class="md-form col-md-4">
                    <label for="cedula" data-toggle="tooltip" data-placement="right" title="Cédula de Ciudadania o Extranjera">Cédula
                        (CC o CE)</label>
                    <input type="text" class="form-control" name="cedula" id="cedula">
                </div>
            </div>

            <div class="form-row">
                <div class="md-form col-md-6">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="md-form col-md-6">
                    <label for="password-confirm">Confirmacion Contraseña</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-7 py-md-4 text-center">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="hombre" name="genero" value="m">
                        <label class="custom-control-label" for="hombre">Hombre</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="mmujer" name="genero" value="f">
                        <label class="custom-control-label" for="mmujer">Mujer</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="md-form">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input data-date-format="yyyy-mm-dd" type="text" name="fecha_nacimiento" id="fecha_nacimiento"
                            class="form-control" required value="{{old('fecha_nacimiento')}}">
                    </div>
                </div>
            </div>
            <div class="form-row flex-column mx-auto text-center pb-2">
                <input type="submit" value="Registrarme" class="btn btn-outline-primary mb-3">
                <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia Sesión</a></p>
            </div>
        </div>
    </form>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="./vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
@endpush @push('scripts')
<script src="./vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="./vendor/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script>
    $('#fecha_nacimiento').datepicker({});
    $('[data-toggle="tooltip"]').tooltip()

</script>













@endpush
