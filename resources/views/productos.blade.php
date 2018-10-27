@extends('layouts.app')

@section('contenido')
<div class="container">
  <div class="row">
    <div class="col-md-12 py-3">
      <h4 class="display-4">
        <i class="fa fa-cocktail"></i>
        <b>Bebidas</b>
      </h4>
      <h6>Texto Segundario</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card-deck">
      @forelse ($bebidas as $bebida)
      <div class="card py-2 hoverable">
          <!-- <span class="card-tag .z-depth-4 badge  bg-secondary">Popular</span> -->
          <div class="p-2">
            <img style="object-fit: cover;border-radius:15px;" class="card-img-top z-depth-1" src="storage/subidas/imagen_producto/{{$bebida->img_producto}}"
                alt="Imagen de {{$bebida->nombre}}">
          </div>
          <a class="card-body" href="{{route('productos.detalles',$bebida)}}">
              <h3 class="card-title h3-responsive">{{$bebida->nombre}}</h3>
              <h4 class="text-muted h4-responsive">$<b>{{$bebida->precio}}</b></h4>
          </a>
            <ul class="nav mx-auto">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-heart"></i>
                  Guardar
                </a>
              </li>
            </ul>
      </div>
      @empty
        <div class="justify-self-center">
          <div class="card card-body z-depth-2 text-center">
            <h1><i class="fa fa-times-circle"></i><br>
              No hay <b>Bebidas</b> registradas</h1>
              <p>Muy pronto estaran disponible.</p>
          </div>
        </div>
      @endforelse
    </div>
    </div>
  </div>
</div>
@endsection
