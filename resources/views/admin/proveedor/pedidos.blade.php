@extends('layouts.proveedor')

@section('titulo','Pedidos ')

@section('contenido')
<div class="box box-default">

	<div class="box-body table-responsive">
		<table class="table text-center" id="material-table">

			<thead>
				<tr>
					<th>Materia Prima / Componente</th>
					<th>Fecha de pedido</th>
					<th>Fecha de Actualizacion</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>

			<tbody></tbody>

		</table>
	</div>

</div>
<div class="pull-right">
	<a class="btn btn-primary" href="#">Confirmar Todos</a>
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
        'ajax'        : '{{url("datatables/pedidos/proveedores")}}',
        columns: [
        { data: 'material', name: 'material' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'estado', name: 'estado' },
        { data: 'accion', name: 'accion' },
        ]
    })
</script>
@endpush

