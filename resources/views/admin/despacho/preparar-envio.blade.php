@extends('admin.despacho.layout')

@section('titulo','Preparar Envio')

@section('contenido')
  <div class="row">
    <div class="col-md-11 col-center">
      <div class="box box-info">
        <div class="box-body">
          <div class="box-header">
            <h4>Preparando envio de: <b>{{$pedido->producto->nombre}}</b></h4>
            <h4>Para: <b>{{$pedido->comprador->nombre_completo()}}</b></h4>
            <h4>Cantidad: <b>{{$pedido->cantidad}}</b></h4>
            <h4>Valor Total: $ <b>{{ $pedido->cantidad * $pedido->producto->precio }}</b></h4>
          </div>
          <hr>
          <form method="post" action="#" id="form-entrega">
            <div class="col-md-4">
              <div class="form-row">
                <div class="form-group">
                  <label for="no_guia">Número de Guia</label>
                  <input
                  type="text"
                  name="no_guia"
                  id="no_guia"
                  class="form-control"
                  readonly
                  value="{{$no_guia}}"
                  >
                  <small class="text-muted">Generado automáticamente</small>
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="empresa_transporte">Empresa de Transporte</label>
                  <select class="select2 form-control" name="empresa_transporte" id="empresa_transporte">
                      <option value="" selected></option>
                      @foreach ($empresas_transporte as $empresa)
                      <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>
            <div class="col-md-8">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-11 col-center">
      <div class="box box-widget box-body text-right">
        <button type="submit" class="btn btn-primary" form="form-entrega">
          <i class="fa fa-arrow-right"></i>
          Enviar
        </button>
      </div>
    </div>
  </div>
@endsection

@push('styles-important')
<link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
$('#empresa_transporte').select2({placeholder: "Empresa encargada del envio"})
</script>
@endpush
