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
    <div class="col-md-8 mx-auto">
      @forelse ($bebidas as $bebida)
        <div class="card my-2">
          <div class="card-body row py-4">
            <div class="col-md-4 my-6">
              {{-- <span class="card-tag .z-depth-4 badge bg-secondary">Nueva</span> --}}
              <img class="card-img-top z-depth-2" src="https://images-gmi-pmc.edge-generalmills.com/3c2132ca-a86b-4c78-9e37-df6000f9d0c3.jpg"
                  alt="Card image cap">
            </div>
            <div class="col-md-8">
              <a href="#">
                  <h3 class="card-title h3-responsive">{{$bebida->nombre}}</h3>
                  <h6 class="card-text h6-responsive">${{$bebida->precio}}</h6>
                  <small class="text-muted">Agregada {{$bebida->created_at->diffforHumans()}}</small>
              </a>
            </div>
          </div>
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
@endsection