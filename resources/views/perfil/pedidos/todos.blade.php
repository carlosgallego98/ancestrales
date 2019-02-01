@extends('layouts.app')
@section('titulo',"Pedidos")

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1> <i class="fa fa-truck"></i> Pedidos</h1>
            <h4>Tienes <b>{{$pedidos->total()}}</b> pedidos en total</h4>
        </div>
    </div>

    <div class="row my-4">

        <div class="col-md-8 py-2 py-md-0">
                <div class="list-group">
                    @forelse ($pedidos as $pedido)
                    <a href="#" class="list-group-item list-group-item-action mb-2 hoverable">
                            <span class="badge badge-secondary">{{$pedido->estado->nombre}}</span>
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$pedido->producto->nombre}}</h5>
                        <small>
                                {{$pedido->created_at->diffForHumans()}}
                        </small>
                      </div>
                      <h6 class="mb-1 font-weight-bold"><span>$ </span>{{$pedido->producto->precio}}</h6>
                      <small>
                           Ultima actualizacion: <b>{{$pedido->updated_at->diffForHumans()}}
                            </b>
                        </small>
                    </a>
                    @empty
                        <div class="text-center">
                                <h4>No Has realizados pedidos</h4>
                                <p>Anímate a realizar uno</p>
                        </div>
                    @endforelse
                            </div>
                            <div class="my-3">
                                    <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                              {{ $pedidos->links() }}
                                            </ul>
                                          </nav>
                            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body">

            </div>
        </div>
    </div>
</div>
@endsection
