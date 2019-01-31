@extends('layouts.app')
@section('titulo','Perfíl')
@section('contenido')
<div class="container">
    @include('perfil.modals.editar_perfil')
    <div class="row mx-auto align-items-center">

        <div class="card card-body imagen-perfil">
            <img src="{{Auth::user()->avatar()}}" alt="Foto de {{Auth::user()->nombres}}">

            <ul class="nav d-flex justify-content-center py-1">
                <li class="nav-item"><a href="#" class="nav-link btn btn-dark" data-toggle="modal" data-target="#modalEditarPerfil">Editar
                        Perfil</a></li>
            </ul>

        </div>

        <div class="d-flex flex-column mx-auto">

            <div class="card card-body flex-center info-perfil">

                <h3 class="h3-responsive font-weight-bold">
                    {{Auth::user()->nombres." ".Auth::user()->apellidos}}
                </h3>

                <span>{{Auth::user()->email}}</span>
                @isset(Auth::user()->direccion)
                <span>{{Auth::user()->direccion}}</span>
                @else @endif

            </div>

            <div class="card">
                <div class="card-body text-center">
                    <h6 class="card-title h6-responsive font-weight-bold">
                        Números de Teléfono
                    </h6>
                    @forelse (Auth::user()->numeros as $numero) {{ (!$loop->first) ? ',': '' }}
                    <span>{{$numero->numero}}</span> @empty
                    <span>Sin Números de Teléfono</span>
                    <a href="#" class="text-center">Agrega un Número</a> @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-body">

                <h6 class="card-title h6-responsive font-weight-bold">
                    Tus pedidos
                </h6>

                @if (count($pedidos)>=1)
                <table class="table table-sm table-hover text-center">
                    <thead>
                        <tr>
                            <th>Bebida</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                        <tr>
                            <td><a href="{{route('productos.detalles',$pedido->producto)}}" title="Detalles de la bebida">{{$pedido->producto->nombre}}</a></td>
                            <td>{{$pedido->estado->nombre}}</td>
                            <td>{{$pedido->created_at}}</td>
                            <td><a href="{{route('pedidos.detalles',$pedido)}}" title="Detalles del Pedido">Detalles</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr />
                <div class="text-center">
                    <a href="{{route('pedidos')}}">Ver Todos</a>
                </div>
                @else
                    <div class="text-center">
                            <h4 class="display-3">0</h4>
                            <h6>No has realizado pedidos</h6>
                            <small>Anímate y realiza uno</small>
                    </div>
                @endif

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body">

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
