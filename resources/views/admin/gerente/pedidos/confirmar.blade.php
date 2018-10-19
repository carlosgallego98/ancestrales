@extends('layouts.admin')

@section('titulo','Por Confirmar')
@section('subtitulo','Pedidos')

@section('contenido')
        <div class="col-xs-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table" id="pedidos-proveedor-table">
                    <thead>
                        <tr>
                            <th>Codigo de Pedido</th>
                            <th>Material / Componente</th>
                            <th>Proveedor</th>
                            <th>Fecha de Pedido</th>
                            <th>Ultima Actializacion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/datatables.min.css">
@endpush
@push('scripts')
    <script src="/adminlte/plugins/datatables/datatables.min.js"></script>

    <script>
        $('#pedidos-proveedor-table').DataTable({
        serverSide: true,
        'lengthChange': false,
        'paging'      : true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true,
        'ajax'        : '{{url("datatables/pedidos/materiales/confirmar")}}',
        columns: [
            { data: 'codigo', name: 'codigo' },
            { data: 'material', name: 'material' },
            { data: 'proveedor', name: 'proveedor' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'confirmar_pedido', name: 'confirmar_pedido'},
        ]
        })
</script>
@endpush
