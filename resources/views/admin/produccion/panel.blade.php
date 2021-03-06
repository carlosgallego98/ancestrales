@extends('admin.produccion.layout')

@section('titulo','Escritorio')
@section('subtitulo','Area de Producción')

@section('contenido')
<div class="row">
    {{-- Cajas de Informacion --}}

    <div class="col-md-4">
      <div class="box box-info">
        <div class="box-body text-center">
          <label>Registrar Elaboracion de Bebida</label>
          <form action="{{url('/registrar-elaboracion')}}" method="post">
             @csrf
            <div class="form-group">
              <input class="form-control"
                     type="text"
                     name="codigo_pedido"
                     placeholder="Codigo del Pedido">
            </div>
            <div class="form-group">
              <input type="submit"
                     value="Continuar"
                     class="btn btn-success btn-block">
            </div>
          </form>
        </div>
      </div>

            @component('admin.componentes.info-box')
                @slot('color','green')
                @slot('icono','shopping-cart')
                @slot('titulo','Pedidos')
                @slot('numero',$count_pedidos)
            @endcomponent

            @component('admin.componentes.info-box')
                @slot('color','aqua')
                @slot('icono','user')
                @slot('titulo','Materiales')
                @slot('numero',$count_materiales)
            @endcomponent
    </div>

      <div class="col-md-8">
          <div class="box box-info">
               <div class="box-header with-border">
                 <h3 class="box-title">Pedidos Recientes</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>

               </div>
               <div class="box-body">
                 <div class="">
                   <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Codigo de Pedido</th>
                        <th>Producto</th>
                        <th>Estado</th>
                      </tr>
                      </thead>
                      <tbody>
                      @forelse ($pedidos as $pedido)
                      <tr>
                        <td><a href="#" class="text-uppercase">{{$pedido->codigo}}</a></td>
                      <td>{{$pedido->producto->nombre}}</td>
                        <td>
                          @switch($pedido->estado->nombre)
                            @case('Confirmado')
                              <span class="label label-success">Confirmado</span>
                            @break

                            @case('Sin Confirmar')
                              <span class="label label-warning">Sin Confirmar</span>
                            @break
                          @endswitch
                        </td>
                      </tr>
                      @empty
                        <tr style="text-align: center;">
                         <td colspan="3" ><b>No se han realizado Pedidos</b></td>
                        </tr>
                      @endforelse
                      </tbody>
                   </table>
                 </div>
               </div>
             </div>
        </div>
    </div>
   <div class="row">
      {{-- Ordenes Recientes --}}
   </div>
</div>
@endsection
