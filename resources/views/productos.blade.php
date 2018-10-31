@extends('layouts.app')

@section('contenido')

@if(count($bebidas)>=1)
  <div class="container">
    <div class="row">
  <div class="col-md-12 py-3">
    <h4 class="display-4">
      <i class="fa fa-cocktail"></i>
      <b>Bebidas</b>
    </h4>
    <h6><b>{{$bebidas->total()}}</b> en total</h6>
  </div>
</div>
  </div>

  <div class="container">
      <div class="row flex-center">
        @foreach($bebidas as $bebida)
          <a  href="{{route('productos.detalles',$bebida)}}" class="card card-body card-producto m-2 flex-row col-md-6 hoverable">
            <img class="fluid-img card-img  img-producto" src="{{$bebida->getImagenProducto()}}" alt="">
            <div class="text-center mx-auto my-auto pt-4">
              {{-- <small class="text-success">20% de Descuento</small> --}}
              <h3 class="text-muted">$ <b>{{$bebida->precio}}</b></h3>
              <small class="text-muted">Agregada hace {{{$bebida->created_at->diffForHumans()}}}</small>
              <h5 class="text-secondary card-title"><b>{{$bebida->nombre}}</b><h5>
              <hr>
            </div>
          </a>
        @endforeach
      </div>
      <div class="row py-4">
        <div class="col-md-12 flex-center">
          {{$bebidas->links()}}
        </div>
      </div>
    </div>
@else
<div class="container flex-center vh-100">
  <div class="row">
    <div class="col-md-12 text-center">
        <h1><i class="fa fa-times-circle"></i><br>
          No hay <b>Bebidas</b> registradas</h1>
          <p>No te preocupes muy pronto estaran disponible.</p>
    </div>
  </div>
</div>
@endif
@endsection
