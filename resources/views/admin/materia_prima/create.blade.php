@extends('layouts.admin')

@section('titulo','Registar')
@section('subtitulo','Materia Prima')

@section('contenido')
<div class="row">
    {{-- form --}}
    <div class="col-md-8 col-xs-12" style="float: none;margin: 0 auto;">
        <div class="box box-body box-solid">
            <div class="box-header">
                <h3 class="box-title">Detalles</h3>
            </div>

            <form  action="{{route('materia_prima.store')}}" id="materia-form" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombreInput">Nombre</label>
                        <input type="text" class="form-control" id="nombreInput" placeholder="ej: Azucar" name="nombre" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="cantidadInput">Cantidad</label>
                        <input type="number" class="form-control" id="cantidadInput" placeholder="ej: 10" name="cantidad" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="minimoInput">Minimo Permitido</label>
                        <input type="number" class="form-control" id="minimoInput" placeholder="ej: 10" name="nivel_minimo" required>
                    </div>
                </div>

                <div class="form-row" >
                       <div class="form-group col-md-3">
                           <label>Unidad</label>
                           <input type="text" class="form-control" id="unidadInput" placeholder="ej: kgr" name="unidad" required>
                       </div>
                       <div class="form-group col-md-3">
                           <label for="valorInput">Valor</label>
                           <input type="text" class="form-control" id="valorInput" placeholder="ej: 2.500" name="valor" required>
                       </div>
                       <div class="col-md-3">
                          <div class="form-group">
                            <label>Proveedor</label>
                            <select class="form-control select2" name="proveedor" style="width: 100%;">
                               <option value="0">Selecciona un Proveedor</option>
                           @foreach ($proveedores as $proveedor)
                              <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                           @endforeach
                            </select>
                          </div>
                       </div>
                       <div class="col-md-3">
                            <label>Tipo</label>
                            <select class="form-control select2" name="tipo" id="tipo" style="width: 100%;">
                               <option value="null">Tipo de Material</option>
                               <option value="1">Materia Prima</option>
                               <option value="0">Componente</option>
                            </select>       
                       </div>
                </div>

            </form>
        </div>

        <div class="box box-body box-solid">
            <input type="submit" form="materia-form" class="btn btn-primary pull-right" value="Guardar">
        </div>
    </div>
</div>
@endsection

@push('styles-important')
   <link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet">
   {{-- <link href="/adminlte/plugins/iCheck/flat/yellow.css" rel="stylesheet"> --}}
@endpush

@push('scripts')
<script src="/adminlte/plugins/inputmask/jquery.inputmask.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.date.extensions.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.extensions.js"></script>
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
    $('.select2').select2()
</script>
@endpush
