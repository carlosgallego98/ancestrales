@extends('layouts.admin')

@section('titulo','Materia Prima')
@section('subtitulo','Inventario')

@section('contenido')
<div class="col-xs-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table text-center" id="materia-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Proveedor</th>
                            <th>Valor</th>
                            <th>Fecha de Registro</th>
                            <th>Fecha de Actualizacion</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{route('materia_prima.nuevo')}}">Registrar Material</a>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/datatables.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datatables/datatables.min.js"></script>

    <script>
        $('#materia-table').DataTable({
        serverSide: true,
        'lengthChange': false,
        'paging'      : true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true,
        'ajax'        : '{{url("datatables/materia_prima/$tipo")}}',
        columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'cantidad', name: 'cantidad' },
            { data: 'id_proveedor', name: 'id_proveedor' },
            { data: 'valor', name: 'valor' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            ],
        })
</script>
@endpush
