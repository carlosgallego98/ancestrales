@extends('layouts.auth')

@section('titulo','Iniciar Sesión')

@section('formulario')
<div class="col-md-12 col-lg-6 col-sm-12">
    <form class="card" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text-center p-3 px-5 row">
            <div class="col-md-6">
                <div class="login-logo">
                    <a href="{{ route('inicio') }}" title="Ir al Inicio">
                        <img src="./img/logo.png" alt="Bebidas Típicas Cristina Lozano">
                    </a>
                </div>
            </div>
            <div class="col-md-6 pt-5">
                <h3 class="h3-responsive font-weight-bold ">
                    Iniciar Sesión
                </h3>
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
                    <label for="correo">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="emailHelp"
                        required autofocus>
                    <small class="text-muted float-right" id="emailHelp"></small>
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
            <div class="d-flex justify-content-around text-center">
                <div>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></div>
                <div><a href="{{ route('password.request') }}">Olvidé mi Contraseña</a></div>
            </div>
        </div>
    </form>
</div>
@endsection
