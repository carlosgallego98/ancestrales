@extends('layouts.admin')

@section('titulo','Empleados')
@section('subtitulo','Gerente')

@section('contenido')

<div class="col-xs-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table" id="users-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Cedula</th>
                            <th>Area / Rol</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{route('empleados.nuevo')}}">Registrar Empleado</a>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/datatables.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/datatables/datatables.min.js"></script>

    <script>
        $('#users-table').DataTable({
        serverSide: true,
        'lengthChange': false,
        'paging'      : true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true,
        'ajax'        : '{{url("datatables/empleados")}}',
        columns: [
            { data: 'nombres', name: 'nombres' },
            { data: 'apellidos', name: 'apellidos' },
            { data: 'direccion', name: 'direccion' },
            { data: 'correo', name: 'correo' },
            { data: 'cedula', name: 'cedula' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
        ]
        })
</script>
@endpush
