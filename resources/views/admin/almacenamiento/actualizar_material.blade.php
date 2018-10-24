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
        <input type="text" name="id_pedido_proveedor" value="{{$pedido_proveedor->id}}" hidden>
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Material / Componente</label>
              <input type="text" class="form-control" value="{{$pedido_proveedor->material->nombre}}" readonly>
              <input type="text" name="id_material" value="{{$pedido_proveedor->id_material}}" hidden>
            </div>
            <div class="form-group col-md-6">
              <label>Cantidad</label>
              <input class="form-control" name="cantidad" placeholder="0" type="number" min="1" max="999" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Recibido y Firmado</label>
              <input type="text" value="{{auth()->user()->nombre_completo()}}" id="firma" class="form-control" name="firmado_por" required readonly>
              <input type="text" name="id_receptor"  value="{{auth()->user()->id}}" hidden>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
                <label>Observaciones <span class="text-muted">*</span></label>
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
