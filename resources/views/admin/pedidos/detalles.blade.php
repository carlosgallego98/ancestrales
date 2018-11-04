@extends('layouts.admin')

@section('titulo', $pedido->producto->nombre )
@section('subtitulo','Detalles Pedido')

@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-body">
        <div class="">
          <p>
            <label>Cantidad:</label> {{$pedido->cantidad}}<br>
            <label>Valor Unitario:</label> ${{$pedido->producto->precio}}<br>
            <label>Valor Total:</label> ${{$pedido->cantidad * $pedido->producto->precio}}
          </p>
            <label>Ingredientes:</label>
            <ul>
              @foreach ($pedido->producto->materiales as $material)
                <li>{{$material->nombre}}</li>
              @endforeach
            </ul>
        </div>
        <p>A nombre de: <b>{{$pedido->comprador->nombre_completo()}}</b></p>
      </div>
    </div>
  </div>
</div>
@endsection
