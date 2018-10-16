@extends('layouts.auth')

@section('titulo','Inicio Sesion | Proveedor')

@section('formulario')
<div class="col-md-12 col-lg-6 col-sm-12">
    <form class="card" method="POST" action="/login-proveedores">
        @csrf
        <div class="text-center p-3">
            <div class="login-logo">
                <a href="{{ route('inicio') }}" title="Ir al Inicio">
                    <img src="/img/logo.png" alt="Bebidas Típicas Cristina Lozano">
                </a>
            </div>
            <h5 class="h5-responsive font-weight-bold ">
                Login Proveedores
            </h5>
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
                    <label for="nit">NIT</label>
                    <input type="text" class="form-control" id="nit" name="nit" maxlength="9" aria-describedby="nitHelp"
                        required autofocus>
                    <small class="text-muted float-right" id="emailHelp">Número de Identificación Tributaria</small>
                </div>
                <div class="md-form">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="text-center pb-3">
                <button type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>
            </div>
        </div>
    </form>
</div>
@endsection