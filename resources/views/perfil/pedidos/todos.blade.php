@extends('layouts.app')
@section('titulo',"Pedidos")

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1> <i class="fa fa-truck"></i> Pedidos</h1>
            <h4>Tienes <b>0</b> pedidos en total</h4>
        </div>
    </div>

    <div class="row my-4">

        <div class="col-md-8 py-2 py-md-0">
                <div class="list-group">
                        @for ($i = 0; $i < 5; $i++)
                                <a href="#" class="list-group-item list-group-item-action mb-2 hoverable">
                                  <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Nombre del Producto</h5>
                                    <small>3 days ago</small>
                                  </div>
                                  <h6 class="mb-1 font-weight-bold">$300.000,00</h6>
                                  <small>Estado</small>
                                </a>
                                @endfor
                            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body">

            </div>
        </div>
    </div>
</div>
@endsection
