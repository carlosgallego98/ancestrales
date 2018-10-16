<div style="text-align: center;padding-top: 20px;">
<img src="/img/logo.png" style="height: 100px">
</div>
@component('mail::message')
# Nuevo Pedido de <b>"{{$nombre_material}}"</b>
Saludos <b>{{ $nombre_proveedor }}</b> tienes un nuevo pedido de <b>{{$nombre_material}}</b> sin confirmar,
por favor ingresa a nuestra plataforma y confirmalo.

@component('mail::button', ['url' => '/login-empleados'])
Ver Pedidos
@endcomponent

@if ($numero_pedidos>1)
  @component('mail::panel')
    Tienes <b>{{$numero_pedidos-1}}</b> pedidos mas sin confirmar
  @endcomponent
@endif

<b>{{Auth::guard('empleado')->user()->nombre_completo()}}</b><br>
{{ config('app.name') }}
@endcomponent
