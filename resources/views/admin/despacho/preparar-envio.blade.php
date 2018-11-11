@extends('admin.despacho.layout')

@section('titulo','Preparar Envio')

@section('contenido')
<div class="row">
  <div class="col-md-12">

    <div class="box box-info">
      <div class="box-body">
        <div class="box-header">
          <h4>Preparando envio de: <b>{{$pedido->producto->nombre}}</b></h4>
          <h4>Para: <b>{{$pedido->comprador->nombre_completo()}}</b></h4>
          <h4>Cantidad: <b>{{$pedido->cantidad}}</b></h4>
          <h4>Valor Total: $ <b>{{ $pedido->cantidad * $pedido->producto->precio }}</b></h4>
        </div>
      </div>
    </div>

    <div class="row" id="datos_empresa">
      <div class="col-md-8">
        @csrf
        <div class="box box-widget box-body" style="min-height:200px">
          <div class="row" style="margin: 0 auto">
              <div class="col-md-4 img-empresa text-center">
                  <img v-bind:src="empresa.img_empresa"  alt="" srcset="">
                </div>
                <div class="col-md-8">
                    <h2><b>@{{ empresa.nombre }}</b></h2>
                    <h4 class="text-muted">@{{empresa.correo}}</h4>
                    <h4>@{{ empresa.numero_teléfono}}</h4>
                </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <form class="box box-widget box-body"
        method="POST" action="{{ route('pedido.enviar',$pedido) }}" id="form-entrega">
        @csrf  
        <div class="form-group">
            <label for="no_guia">Número de Guia</label>
            <input type="text" name="no_guia" id="no_guia" class="form-control" readonly value="{{$no_guia}}">
            <small class="text-muted">Generado automáticamente</small>
          </div>

          <div class="form-group">
            <label for="empresa_transporte">Empresa de Transporte</label>
            <select v-model="id" v-on:change="getDatosEmpresa()" name="empresas_transporte" id="empresas_transporte"
              class="form-control">
              @foreach ($empresas_transporte as $empresa)
              <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
              @endforeach
            </select>
          </div>
          
        </form>
      </div>
    </div>

  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-widget box-body text-right">
      <button type="submit" class="btn btn-primary" form="form-entrega">
        <i class="fa fa-arrow-right"></i>
        Enviar
      </button>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .empresas-selector {
    display: flex;
    flex-direction: row;
    justify-content: center;
  }

  .radio-empresa {
    display: flex;
    flex-direction: column;
    text-align: center;
    margin: 20px 30px;
  }

  .img-empresa img {
    height: 170px;
    width: 170px;
    object-fit: contain;
  }
</style>
@endpush

@push('styles-important')
<link href="/adminlte/plugins/select2/css/select2.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('js/vue.js')}}" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script>







</script>

<script>
  var vm = new Vue({
    el: "#datos_empresa",
    data: {
      url: "{{url('empresa-transporte')}}",
      id: 1,
      empresa: {}
    },
    mounted() {
      this.getDatosEmpresa()
    },
    methods: {
      getDatosEmpresa() {
        axios.get(this.url + "/" + this.id).then((response) => { this.empresa = response.data })
      }
    }
  });
</script>

@endpush