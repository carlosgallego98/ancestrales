@extends('layouts.admin')

@section('titulo','Escritorio')
@section('subtitulo','Bodega y Almacenamiento')

@section('contenido')
<div class="row"></div>

<div class="row">
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-body">
				<div class="box-header">
					<h4><b>Ordenes de Entrega</b></h4>
					<p class="text-muted">Estas bebidas deben ser entregadas al <b>Area de Despacho</b></p>
				</div>
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th>ID del Pedido</th>
								<th>Bebida</th>
								<th>Fecha de Creacion</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@forelse ($ordenes_entrega as $orden)
									<tr>
										<td class="text-uppercase">{{$orden->pedido->codigo}}</td>
										<td>{{$orden->pedido->producto->nombre}}
										<td>{{$orden->created_at}}</td>
										<td><a href="{{route('orden.entregar',[$orden->pedido,$orden])}}"><b>Entregar</b></a></td>
									</tr>
							@empty
								<tr class="text-center">
									<td colspan="4">
										<h5>
											<b>No hay Ordenes de Entrega</b>
										</h5>
									</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	      <div class="col-md-4">
         <div class="box box-primary">
            <div class="box-body">
							<div class="box-header">
								<h3 class="box-title"><b>Materiales en estado Crítico</b></h3><br>
										<p class="text-muted">{{count($materiales_criticos)}} en Total</p>
										@if(count($materiales_criticos)>=1)
											<a href="{{route('produccion.reabastecer')}}" class="uppercase">Enviar Pedidos</a>
										@endif
							</div>
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
