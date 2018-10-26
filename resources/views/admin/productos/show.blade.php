@extends('layouts.admin')

@section('titulo',$producto->nombre)

@section('subtitulo','Detalles')

@section('contenido')
<div class="row">
  <div class="col-md-12">

  </div>
</div>
<div class="row">
  <div class="col-md-11 col-center">
    <div class="box">
      <div class="box-body">
        <label>Descripcion:</label>
        <p>{{$producto->descripcion}}</p>
        <hr>
        <label>Precio:</label> ${{$producto->precio}}
        <hr>
          <label>Ingredientes:</label>
          <ul>
            @foreach ($producto->materiales as $material)
              <li>{{$material->nombre}}</li>
            @endforeach
          </ul>
          <hr>
  </div>
  </div>
  <div class="box box-widget box-body text-right">
    <button class="btn btn-primary"> <i class="fa fa-pen"></i> Editar</button>
  </div>
  </div>
</div>
@endsection
