@extends('admin.produccion.layout')

@section('titulo','Fabricacion Bebida')

@section('contenido')
<div class="row text-center">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-body">
				<div class="row ">

					<div class="box-header col-md-6">
						<p>Bebida</p>
						<h1><b>{{$pedido->producto->nombre}}</b></h1>
						<h4 class="text-muted"><b>${{$pedido->producto->precio}}</b></h4>
					</div>
					<div class="box-header col-md-6">
							<p>Comprador</p>
							<h1 class="h1-responsive"><b>{{$pedido->comprador->nombre_completo() }}</b></h1>
							<h4>{{$pedido->comprador->email}}</h4>
							<h4>{{$pedido->comprador->direccion}}</h4>            
						</div>
					</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-widget">
            <div class="box-body">
                <div class="box-header">
                    <h4><b>Materia Prima / Componentes Utilizados</b></h4>
                <p class="text-muted">Especifica la cantidad Materia Prima o Componentes utilizados en la fabricacion de <b>{{$pedido->producto->nombre}}</b>.</p>
                    <hr>
                <form action="{{route('pedido.elaborado',$pedido)}}" method="POST" id="form-ingredientes">
                        @csrf
                    <div class="form-row">
                        @foreach ($pedido->producto->materiales as $material)
                        <div class="form-group col-md-6">
                                <label for="{{$material->nombre}}">
                                    {{$material->nombre}}
                                </label>
                            <input class="form-control" type="number" name="{{$material->id}}" placeholder="Cantidad de {{$material->nombre}} (s)">
                            </div>
                        @endforeach
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="box box-widget">
                    <div class="box-body">
                        <input class="btn btn-success" value="Continuar" type="submit" form="form-ingredientes">
                    </div>
            </div>
    </div>
</div>
@endsection
