@extends('layouts.admin')

@section('titulo','Registar')
@section('subtitulo','Materia Prima')

@section('contenido')
<div class="row justify-content-center">
    {{-- form --}}
    <div class="col-md-6" style="float: none;margin: 0 auto;">
        <div class="box box-body box-solid">
            <div class="box-header">
                <h3 class="box-title">Detalles</h3>
            </div>

            <form  action="{{route('materia_prima.store')}}" id="materia-form" method="POST" style="text-align: center;">
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

                <div class="form-row" style="">
                    <div class="form-group col-md-offset-2 col-md-3">
                        <label for="unidadInput">Unidad</label>
                        <input type="text" class="form-control" id="unidadInput" placeholder="ej: kgr" name="unidad" required>
                    </div>
                    <div class="form-group col-sm-offset-2 col-md-3">
                        <label for="valorInput">Valor</label>
                        <input type="text" class="form-control" id="valorInput" placeholder="ej: 2.500" name="valor" required>
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

@push('scripts')
<script src="/adminlte/plugins/inputmask/jquery.inputmask.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.date.extensions.js"></script>
<script src="/adminlte/plugins/inputmask/jquery.inputmask.extensions.js"></script>

<script>
    // $('#fechaNacimientoInput').inputmask('yyyy-mm-dd')
    // $('#cedulaInput').inputmask('9999999999',{ min: 8, max: 10, allowMinus: true })
</script>
@endpush
