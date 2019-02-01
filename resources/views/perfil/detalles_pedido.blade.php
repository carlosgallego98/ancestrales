@extends('layouts.app')
@section('titulo',"Pedido: {$pedido->producto->nombre} ")

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h4 class="display-4">
            <i class="fa fa-cart-arrow-down"></i>
            <b>Detalles del Pedido</b>
            </h4>
            <h6><p class="p-0 m-0 text-muted"><i class="far fa-clock mr-1"></i>Realizado el <b>{{$pedido->created_at}}</b></p></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-body mb-3" style="min-height:220px;">
                <h6 class="text-muted p-0 m-0">Detalle del Producto</h6>

                <div class="row py-2">
                    <div class="col-md-4 flex-center">...</div>
                    <div class="col-md-8">
                        <h4><b>{{$pedido->producto->nombre}}</b></h4>
                        <h6 class="font-weight-bold"><span>$</span>{{$pedido->producto->precio}}</h6>
                        <div style="  white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                            <p>{{$pedido->producto->descripcion}}</p>
                        </div>
                        <div class="text-right">
                            <a href="#">Ver Más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4"">
            <div class="card card-body text-center mb-3" style="min-height:220px;">
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
