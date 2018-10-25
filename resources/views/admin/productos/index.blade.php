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
						<th>Proveedor</th>
						<th>Precio</th>
						<th>Fecha de Registro</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Producto</th>
						<th><a href="#">Proveedor</a></th>
						<th>$400,000</th>
						<th>24-05-2018</th>
						<th><a href="#">Dellates</a></th>
					</tr>
				</tbody>
			</table>
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
