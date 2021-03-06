@extends('layouts.proveedor')

@section('titulo','Materia Prima ')

@section('contenido')
<div class="box box-default">

	<div class="box-body table-responsive">
		<table class="table text-center" id="material-table">

			<thead>
				<tr>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Minimo Permitido</th>
					<th>Fecha de Registro</th>
					<th>Ultima Actualizacion</th>
					<th>Pedido</th>
				</tr>
			</thead>

			<tbody></tbody>

		</table>
	</div>

</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="/adminlte/plugins/datatables/datatables.min.css">
@endpush

@push('scripts')
<script src="/adminlte/plugins/datatables/datatables.min.js"></script>

<script>
    $('#material-table').DataTable({
        serverSide: true,
        'lengthChange': false,
        'paging'      : true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true,
        'ajax'        : "{{url('datatables/materia_prima/'.auth()->user()->id)}}",
        columns: [
        { data: 'tipo', name: 'tipo' },
        { data: 'nombre', name: 'nombre' },
        { data: 'cantidad', name: 'cantidad' },
        { data: 'nivel_minimo', name: 'nivel_minimo' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'en_pedido', name: 'en_pedido' },
        ]
    })
</script>
@endpush