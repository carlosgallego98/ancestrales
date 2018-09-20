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
    <div class="card-body pt-0 px-sm-5">
        <div class="form-row">
            <div class="col-md-6">
                <div class="md-form">
                    <label for="nombres">Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="md-form">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                </div>
            </div>
        </div>

        <div class="md-form">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control">
        </div>

        <div class="form-row">
            <div class="md-form col-md-6">
                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="md-form col-md-6">
                <label for="password-confirm">Confirmacion Contraseña</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-7 py-md-4 text-center">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genero" name="genero" value="M">
                    <label class="custom-control-label" for="masculino">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="genero" name="genero" value="F">
                    <label class="custom-control-label" for="femenino">Femenino</label>
                </div>
            </div>
            <div class="col-md-5">
              <div class="md-form">
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input data-date-format="yyyy-mm-dd" type="text" name="fecha_nacimiento" id="fecha_nacimiento"  class="form-control">
              </div>
            </div>
        </div>
    </div>
    <div class="form-row justify-content-center p-1">
      <input type="submit" value="Registrarme" class="btn btn-outline-primary">
  </div>
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="./vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
@endpush
@push('scripts')
    <script src="./vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="./vendor/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script>
    $('#fecha_nacimiento').datepicker({});
</script>
@endpush

