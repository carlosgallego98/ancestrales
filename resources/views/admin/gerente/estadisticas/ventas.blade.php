@extends('layouts.admin') 
@section('titulo','Ventas') 
@section('subtitulo','Estadísticas') 
@section('contenido')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body table-responsive">
            <table class="table" id="ventas-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Hoy</th>
                        <th>Ayer</th>
                        <th>Esta Semana</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 9; $i++)
                    <tr>
                        <td><a href="#">Este es un producto con un nombre largo</a></td>
                        <td class="text-blue">{{1500-$i}}</td>
                        <td class="text-green">{{3+$i}}</td>
                        <td class="text-red">{{2*$i}}</td>
                        <td><a href="#">Detalles</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Agua con Limón</a></td>
                        <td class="text-red">{{200-$i}}</td>
                        <td class="text-green">{{32+$i}}</td>
                        <td class="text-blue">{{65+$i}}</td>
                        <td><a href="#">Detalles</a></td>
                    </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="/adminlte/plugins/datatables/datatables.min.css"> 
@endpush @push('scripts')
    <script src="/adminlte/plugins/datatables/datatables.min.js"></script>
    
    <script>
        $('#ventas-table').DataTable({
        'lengthChange': false,
        'paging'      : true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        'language'    : {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        })
</script>

@endpush