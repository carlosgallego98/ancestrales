@extends('layouts.admin')

@section('titulo','Escritorio')
@section('subtitulo','Bodega y Almacenamiento')

@section('contenido')
<div class="row"></div>

<div class="row">
	      <div class="col-md-4">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Materiales en estado <b>Crítico</b></h3><br>
                  <p>{{count($materiales_criticos)}} en Total</p>
                  @if(count($materiales_criticos)>=1)
                    <a href="{{route('produccion.reabastecer')}}" class="uppercase">Enviar Pedidos</a>
                  @endif
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                  @forelse ($materiales_criticos as $material)
                     @if(!$material->en_pedido)
                     <li class="item">
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"> <i class="fa fa-cubes"></i> {{$material->nombre}}
                        <span class="product-description">de {{$material->nombre_proveedor}}</span>
                        <small class="product-description text-red"> <i class="fa fa-exclamation-triangle"></i> Quedan {{$material->cantidad}} {{$material->unidad}}(s)</small>
                      </div>
                    </li>
                     @endif
                  @empty
                  @endforelse
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Ver todo</a>
                </div>
            <!-- /.box-footer -->
          </div>
      </div>
</div>
@endsection
