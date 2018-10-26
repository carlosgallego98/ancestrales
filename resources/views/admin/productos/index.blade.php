@extends('layouts.admin')

@section('titulo','Productos')

@section('subtitulo','Inventario')

@section('contenido')

<div class="row">
	<div class="col-md-10 col-center">
	<div class="box">
		<div class="box-body table-responsive">
			<table class="table text-center">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Fecha de Registro</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($productos as $producto)
						<tr>
							<th>{{ $producto->nombre }}</th>
							<th>${{ $producto->precio }}</th>
							<th>{{ $producto->created_at }}</th>
							<th><a href="{{route('inventario.productos.detalles',$producto)}}">Dellates</a></th>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{$productos->links()}}
			</div>
		</div>
	</div>
	</div>
</div>
<div class="row ">
	<div class="col-md-10 col-center">
		<div class="box box-body box-widget text-right">
			<a href="{{route('inventario.productos.registrar')}}" class="btn btn-primary">Registrar</a>
		</div>
	</div>
</div>

@endsection
