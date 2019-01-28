@extends('layouts.app')
@section('titulo',"Pedido: {$pedido->producto->nombre} ")

@section('contenido')
<div class="container">
    <div class="row">



<h6 class="text-muted p-0 m-0">Pedido:</h6>
                <h4 class="p-0 m-0"><i class="fa fa-cocktail mr-1"></i><b>{{$pedido->producto->nombre}}</b></h5>
                <p class="p-0 m-0"><i class="far fa-clock mr-1"></i>   Realizado el {{$pedido->created_at}}</p>

        <div class="col-md-8">
            <div class="card card-body mb-3">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <h5>Nombre del Producto</h5>
                        <h6>Precio</h6>
                        <p>Descripcion recortada</p>
                        <div class="text-right">
                            <a href="#">Detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-body text-center mb-3">
                <i class="fa fa-cart-arrow-down fa-3x m-2"></i>
                    <small class="text-muted">Estado del Pedido</small>
                    <h5><b>{{$pedido->estado->nombre}}</b></h5>
                <p class="p-0 m-0">
                    <small class="text-muted">Ultima Actualizacion</small>
                    <h6>{{$pedido->updated_at}}</h6>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
