@extends('layouts.auth')

@section('titulo','Inicio Sesion | Empresa')

@section('formulario')
<div class="col-md-12 col-lg-6 col-sm-12">
    <form class="card" method="POST" action="/login-empleados">
        @csrf
        <div class="text-center p-3 px-5 row">
            <div class="col-md-6  my-auto">
                <div class="login-logo">
                    <a href="{{ route('inicio') }}" title="Ir al Inicio">
                        <img src="/img/logo.png" alt="Bebidas Típicas Cristina Lozano">
                    </a>
                </div>
            </div>
            <div class="col-md-6 pt-4">
                <h3 class="h3-responsive font-weight-bold">
                    Iniciar Sesion
                </h3>
                <h5 class="text-muted">- <b>Empresa</b> -</h5>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger text-center">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <div class="card-body">

            <div class="px-sm-5">
                <div class="md-form">
                    <label for="cedula">Cédula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="ccHelp"
                        required autofocus>
                    <small class="text-muted float-right" id="ccHelp">Cédula de Ciudadanía</small>
                </div>
                <div class="md-form">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="text-center pb-3">
                <button type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>

                <div class="custom-control custom-checkbox align-self-center">
                    <input type="checkbox" class="custom-control-input" id="recordarCredenciales"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="recordarCredenciales">Recuerda mis Credenciales</label>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
