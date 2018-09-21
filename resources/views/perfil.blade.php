@extends('layouts.app')
@section('titulo','Perfíl | ')

@section('conteinido')
<div class="card card-body profile-card container">

    <div class="row mx-auto">
        <div class="profile-pic">
            <img class="z-depth-2" src="https://casafranciscanaoutreach.org/wp-content/uploads/2016/09/generic_avatar.jpg"
                alt="Foto de Mr. Lorem Ipsum">
            <div class="editar-perfil text-center text-white">
                <a href="#">
                    Editar Perfil
                </a>
            </div>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md text-center">
            <div class="profile-info align-content-center">
                <h3 class="h3-responsive font-weight-bold">
                    {{Auth::user()->nombres." ".Auth::user()->apellidos}}
                </h3>
                <p class="d-flex flex-column">
                    <span class="text-muted">{{Auth::user()->correo}}</span>
                    @isset(Auth::user()->direccion)
                    <span>{{Auth::user()->direccion}}</span>
                    @else
                    <span>Sin direccion</span>
                    @endif
                    @empty(Auth::user()->numeros)
                    <span>Sin numeros telefonicos</span>
                    <a href="#"><i class="fas fa-plus"> Agregar un Número</i></a>
                    @else
                    <ul class="list-inline">
                        @foreach (Auth::user()->numeros as $numero)
                        <li class="list-inline-item font-weight-bold">{{$numero->numero}}</li>
                        @endforeach
                        <br>
                    <a href="#"> <i class="fas fa-pen"></i> Editar Números</a>

                    </ul>
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-md-6">
            Ordenes de Bebidas
        </div>
        <div class="col-md-6">
            Bebidas Guardadas
        </div>
    </div>

</div>
@endsection
@push('styles')
<link rel="stylesheet" href="/css/profile.min.css">
@endpush
@push('scripts')
<script>
    $(document).ready(function () {
        $('.profile-pic').hover(function () {
            $('.editar-perfil').toggleClass('show');
        });
    });

</script>
@endpush
