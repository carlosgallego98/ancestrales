@extends('layouts.admin')

@section('titulo','Registrar')

@section('subtitulo','Producto')

@section('contenido')
<form action="{{url('/inventario/productos/registrar')}}" method="POST" enctype="multipart/form-data">
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
						<input type="text" id="precio" name="precio" class="form-control" required="">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="descripcion">Descripcion</label>
						<textarea type="text" name="descripcion" class="form-control" rows="5" required=""></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="ingredientes">Ingredientes</label>
						<select name="ingredientes[]" id="ingredientes" class="select2 form-control" multiple="multiple" required>
							@foreach($materiales as $material)
								<option value="{{$material->id}}">{{$material->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-body text-center">
				<img  id="imagenProducto" width="200px" height="200px" style="object-fit: cover;border-radius:10px;" src="https://t1.rg.ltmcdn.com/es/images/7/3/2/img_bebida_sanbertin_16237_600_square.jpg" alt="">
					<div class="input-group" style="width: 100%;padding: 16px 30px;">
						<input type="file" name="img_producto" id="inputImagen">
					</div>
			</div>
			<div class="box box-body box-widget text-right">
				<input type="submit" value="Registrar" class="btn btn-primary" required>
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
<script src="/vendor/imask.js"></script>
<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#imagenProducto')
      .attr('src', e.target.result);};
      reader.readAsDataURL(input.files[0]);
    }}

		var element = document.getElementById('precio');
	var maskOptions =
  {
    mask: '$num',
    blocks: {
      num: {
        // nested masks are available!
        mask: Number,
        thousandsSeparator: ','
      }
    }
  };

	var mask = new IMask(element, maskOptions);

	$("#inputImagen").change(function(e){
		readURL(this)
	});
	$('#ingredientes').select2({placeholder: "Selecciona los Ingredientes"})
	$('#proveedor').select2({placeholder: "Selecciona el Proveedor"})
</script>
@endpush
