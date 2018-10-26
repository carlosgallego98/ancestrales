@extends('layouts.admin')

@section('titulo','Registrar')

@section('subtitulo','Producto')

@section('contenido')
<form action="{{url('/inventario/productos/registrar')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-8">
			<div class="box box-body">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" required="">
					</div>
					<div class="form-group col-md-6">
						<label for="precio">Precio</label>
						<input type="text" name="precio" class="form-control" required="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="descripcion">Descripcion</label>
						<textarea type="text" name="descripcion" class="form-control" rows="5" required=""></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-body">
				<div class="form-group">
					<label for="ingredientes">Ingredientes</label>
					<select name="ingredientes[]" id="ingredientes" class="select2 form-control" multiple="multiple">
						@foreach($materiales as $material)
							<option value="{{$material->id}}">{{$material->nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="box box-body box-widget text-right">
				<input type="submit" value="Registrar" class="btn btn-primary">
			</div>
		</div>
	</div>
</form>

@endsection

@push('styles-important')
<link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
	$('#ingredientes').select2({placeholder: "Selecciona los Ingredientes"})
	$('#proveedor').select2({placeholder: "Selecciona el Proveedor"})
</script>
@endpush
