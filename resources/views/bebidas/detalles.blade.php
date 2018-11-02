@extends('layouts.app')

@section('contenido')
<div class="container vh-100 my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class=" row mx-auto">
                    <div class="col-sm-7 py-4">
                        <img class="img-fluid rounded z-depth-1" src="{{$bebida->getImagenProducto(true)}}" alt="Imagen del Producto">
                    </div>
                    <div class="card-body p-2 text-center m-auto flex-column col-sm-5">
                        <h3 class="h3-responsive font-weight-bold">
                            {{$bebida->nombre}}
                        </h3>
                        <h4 class="h4-responsive">$ {{$bebida->precio}}</h4>
                        @can("realizar ordenes")
                        <div class="py-2">
                            <a href="{{route('productos.pedido',$bebida)}}" class="btn btn-secondary waves-effect waves-light {{ ($bebida->enPedido()) ? 'disabled' : ''}}"
                            >Comprar</a>
                                
                            <a href="#" class="card-link"><i class="fa fa-heart"></i> Guardar</a>
                        </div>
                        @if ($bebida->enPedido())
                        <p><i class="fa fa-check text-success"></i> La has ordenado <a href="#">detalles</a></p>                            
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Descripcion Producto -->
    <div class="row my-1">
        <div class="col-md-12">
            <div class="card card-body">
                <h3 class="h3-responsive font-weight-bold">Descripcion:</h3>
                {{$bebida->descripcion}}
            </div>
        </div>
    </div>

    <!-- Comentarios -->
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    @endsection
