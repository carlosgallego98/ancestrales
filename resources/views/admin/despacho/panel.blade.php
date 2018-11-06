@extends('admin.despacho.layout')

@section('titulo','Escritorio ')
@section('subtitulo','Area de Despacho')

@section('contenido')
  <div class="row">
    <div class="col-md-11 col-center">
      <div class="box box-info">
        <div class="box-body">
          <div class="box-header">
            <h4><b>Pendientes a Entregar</b></h4>
            <p class="text-muted">Estas son las bebidas que deben ser <b>enviadas</b> a sus compradores.</p>
            <h5 class="text-muted">
              {{$pedidos_listos->total()}} en Total.
            </h5>
          </div>
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Bebida</th>
                  <th>Comprador</th>
                  <th>Fecha de Compra</th>
                  <th>Ultima de Actualizacion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @forelse ($pedidos_listos as $pedido)
                  <tr>
                    <td>{{$pedido->producto->nombre}}</td>
                    <td>{{$pedido->comprador->nombre_completo()}}</td>
                    <td>{{$pedido->created_at}}</td>
                    <td>{{$pedido->updated_at}}</td>
                    <th><a href="{{route('preparar.envio',$pedido)}}"><b>Preparar Envio</b></a></th>
                  </tr>
              @empty
                  <tr>
                    <td> <h4><b>No pendidos listo para entregar </b></h4> </td>
                  </tr>
              @endforelse
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
