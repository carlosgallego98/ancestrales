@extends('layouts.admin')

@section('titulo','Actualizar')
@section('subtitulo','Inventario')

@section('contenido')
<div class="row">
  <div class="col-md-8 col-xs-12" style="float: none;margin: 0 auto;">
    <div class="box box-body box-solid">
      <div class="box-header">
        <h3 class="box-title">Ingreso de Materia Prima</h3>
      </div>
      <div class="box-body">
        <form action="{{url('/materia-prima/actualizar')}}" method="POST">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Material / Componente</label>
              <select name="elemento" id="elemento" class="form-control select2" required>
                @foreach ($materiales as $material)
                    <option value="{{$material->id}}">
                    {{$material->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Cantidad</label>
              <input class="form-control" name="cantidad" placeholder="0" type="number" min="1" max="999" required>
            </div>
          </div>     
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Recibido y Firmado</label>
              <input type="text" name="receptor" value="{{auth()->user()->nombre_completo()}}" id="firma" class="form-control" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
                <label>Observaciones <span class="text-muted">(Opcional)</span></label>
                <textarea class="form-control" name="observaciones" rows="3" placeholder="" required></textarea>
              </div>
        </div>
          <div class="form-row">
            <div class="col-md-12">
            <input type="submit" value="Registrar" class="btn btn-primary pull-right" id="btn-registrar">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles-important')
<link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet">
{{-- <link href="/adminlte/plugins/iCheck/flat/yellow.css" rel="stylesheet"> --}}
@endpush

@push('scripts')
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
  $('.select2').select2()
  $('#firma').keyup(()=>{
    alert(this.text)
  });
</script>
@endpush