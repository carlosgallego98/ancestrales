@extends('layouts.app')
@section('titulo',"Pedido: '{$bebida->nombre}'")

@section('contenido')
<div class="container my-3">

    <div class="flex-center  vh-100">
        <div class="col-md-6 card card-body hoverable text-center">
            <h2 class="display-4">
                <i class="fa fa-cart-arrow-down"></i>
            </h2>
            <h5>Nuevo Pedido</b></h5>
            <h4><b>{{$bebida->nombre}}</b></h4>
        <p>Valor total <b><span id="precio_total">{{$bebida->precio}}</span></b></p>
            <h6>A nombre de <b>{{auth()->user()->nombre_completo()}}</b></h6>
            <hr />
            <div class="m-3">
                <form action="{{route('productos.pedido.realizar')}}" method="POST">
                    @csrf
                    <input type="text" name="id_bebida" value="{{$bebida->id}}" hidden>
                    <input type="text" name="id_comprador" value="{{auth()->user()->id}}" hidden>
                    
                    <div class="md-form">
                        <label for="cantidad">Cantidad</label>
                        <input
                            value="1"
                            min="1"
                            max="5"
                            type="number" 
                            name="cantidad" 
                            id="cantidadInput" 
                            class="form-control" />
                    </div>
                    
                    <p>¿Desas realizar el pedido?</p>
                    
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa fa-check"></i>
                        Aceptar
                    </button>
                    
                    <a href="{{route("productos")}}" class="btn btn-outline-secondary">
                        <i class="fa fa-ban"></i>
                        Cancelar
                    </a>
                </form>

            </div>
            <p>Recibirás correo electrónico para continuar con el proceso.</p>

        </div>
    </div>
</div>
@endsection

@push('scripts')
    
    <script>
    $("#cantidadInput").change(()=>{
        var Precio = "{{$bebida->precio}}";
        var CantidadBebida = $("#cantidadInput").val();;
        var PrecioTotal = Precio*CantidadBebida;
        
        $ ("#precio_total").text(PrecioTotal)

    })
    </script>

@endpush