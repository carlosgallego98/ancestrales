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
        <form action="#">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Text</label>
              <input class="form-control" placeholder="Enter ..." type="text">
            </div>
            <div class="form-group col-md-6">
              <label>Text</label>
              <input class="form-control" placeholder="Enter ..." type="text">
            </div>
          </div>                        
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
