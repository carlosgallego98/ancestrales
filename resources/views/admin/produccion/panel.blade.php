@extends('admin.produccion.layout')

@section('titulo','Escritorio')
@section('subtitulo','Area de Producción')

@section('contenido')
<div class="row">
    {{-- Cajas de Informacion --}}

    <div class="col-md-4">
            @component('admin.componentes.info-box')
                @slot('color','green')
                @slot('icono','shopping-cart')
                @slot('titulo','Pedidos')
                @slot('numero',count($pedidos))
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
                        <td><span class="label label-success">{{$pedido->estado->nombre}}</span></td>
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
