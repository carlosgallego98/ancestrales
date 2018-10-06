@extends('layouts.auth')
@section('titulo','Verificar Perfil')

@section('formulario')
    <div class="card">
            <div class="p-5">
                    <a href="{{ route('inicio') }}" title="Ir al Inicio">
                            <img src="/img/logo.png" alt="Bebidas Típicas Cristina Lozano" class="img-fluid" style="max-height: 130px">
                    </a>
            </div>
        <div class="card-body text-center">
            <h5>Para acceder a la Página debes <b>verificar tu perfil</b></h5>
            <p>Mira tu correo, se te ha enviado un link de activacion</p>
            @if(session('resed'))
                <b>Se ha enviado un nuevo enlace de verificacion, mira tu correo.</b>
            @endif
        </div>
        <div class="card-footer">
                <div class="text-center">
                        Si no has si no te ha llegado el correo
                        <a href="{{ route('verification.resend') }}">
                                Solicita otro link de Activacion
                        </a>
                </div>
        </div>
    </div>
@endsection
