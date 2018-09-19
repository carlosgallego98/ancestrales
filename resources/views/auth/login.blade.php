@extends('layouts.auth')
@section('titulo','Iniciar Sesión')
@section('formulario')
<form class="card" method="POST" action="{{ route('login') }}">
        @csrf
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="login-logo">
                                            <img src="./img/logo.png" alt="Bebidas Típicas Cristina Lozano">
                                        </div>
                                        <h3 class="h3-responsive font-weight-bold">
                                            Iniciar Sesión
                                        </h3>
                                    </div>
    <hr>

                                    <div class="px-sm-5">
                                        <div class="md-form">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required autofocus>
                                            {{-- <small class="text-muted float-right" id="emailHelp">Probando</small> --}}
                                        </div>
                                        <div class="md-form">
                                            <label for="password">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-row pb-3 flex-center">
                                            <button type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>
                                    </div>
    
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <!-- Remember me -->
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="recordarCredenciales" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="recordarCredenciales">Recuerda mis Credenciales</label>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- Forgot password -->
                                            <a href="{{ route('password.request') }}">Olvidaste tu Contraseña?</a>
                                        </div>
                                    </div>
    
                                </div>
                            </form>
@endsection
