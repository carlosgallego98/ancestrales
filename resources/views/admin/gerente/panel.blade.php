@extends('layouts.admin')

@section('titulo','Escritorio | Gerente')

@section('contenido')
<div class="conteiner">

    {{-- Cajas de Informacion --}}
    <div class="row">
        @component('admin.componentes.info-box')
            @slot('color','aqua')
            @slot('icono','user')
            @slot('titulo','Clientes')
            @slot('numero','99')
        @endcomponent

        @component('admin.componentes.info-box')
            @slot('color','orange')
            @slot('icono','credit-card')
            @slot('titulo','Ventas')
            @slot('numero','99')
        @endcomponent

        @component('admin.componentes.info-box')
            @slot('color','purple')
            @slot('icono','box')
            @slot('titulo','Productos')
            @slot('numero','99')
        @endcomponent

        @component('admin.componentes.info-box')
            @slot('color','navy')
            @slot('icono','truck')
            @slot('titulo','Proveedores')
            @slot('numero','99')
        @endcomponent

    
    </div>
@endsection
