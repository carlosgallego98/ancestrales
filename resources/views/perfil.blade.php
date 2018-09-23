@extends('layouts.app') 
@section('titulo','Perfíl | ') 
@section('conteinido')
<div class="container">

    <div class="row mx-auto align-items-center">

        <div class="card card-body imagen-perfil">
            <img class="hoverable" src="https://casafranciscanaoutreach.org/wp-content/uploads/2016/09/generic_avatar.jpg" alt="Foto de {{Auth::user()->nombres}}">

            <ul class="nav d-flex justify-content-center py-1">
                <li class="nav-item"><a href="#" class="nav-link btn btn-dark">Editar Perfil</a></li>
            </ul>

        </div>

        <div class="d-flex flex-column mx-auto">

            <div class="card card-body flex-center info-perfil">

                <h3 class="h3-responsive font-weight-bold">
                    {{Auth::user()->nombres." ".Auth::user()->apellidos}}
                </h3>

                <span>{{Auth::user()->correo}} </span> @isset(Auth::user()->direccion)
                <span>{{Auth::user()->direccion}}</span> @else
                <span>Sin direccion</span> @endif

            </div>

            <div class="card">
                <div class="card-body text-center">
                    <h6 class="card-title h6-responsive font-weight-bold">
                        Números de Teléfono
                    </h6>
                    @forelse (Auth::user()->numeros as $numero) {{ (!$loop->first) ? ',': '' }}
                    <span>{{$numero->numero}}</span> @empty
                    <span>Sin Números de Teléfono</span>
                    <nav class="nav"><a href="#" class="nav-item">Agrega un Número</a> @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <div class="row">
            <div class="col-md-6">
                <h6 class="card-title h6-responsive font-weight-bold">
                    Lo que has Ordenado
                </h6>
            </div>
            <div class="col-md-6">
                <h6 class="card-title h6-responsive font-weight-bold">
                    Tu Bebidas Guardadas
                </h6>
            </div>
        </div>
    </div>
</div>
@endsection
 @push('styles')
<link rel="stylesheet" href="/css/profile.min.css"> 
@endpush @push('scripts')
<script>
    $(document).ready(() => {});

</script>





@endpush