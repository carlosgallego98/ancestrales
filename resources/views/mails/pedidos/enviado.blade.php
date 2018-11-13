@component('mail::message')
<div style="text-align: center;padding: 20px;">
    <img src="https://previews.dropbox.com/p/thumb/AAOYjPzYNtYulwmgU3-fmKyiYcCiy3G4st25qz_tWNXMWYXFkVLJgldUzrz22ofueQ49rcPMSbRg5jea3Cs-d_gxMsS-D5BdnDSL0CJeK9wHMQ8crAiE1f-zpjSxh4TuJSAgbVj2_Gua8ld1M6QivxKwycSQrOqtmGA6hwuxGrD8UIQB9Q4YJxDJ-CquUbfKrAuXmKrJ2Q-TLOq8LAagqqZ1cyiEjwk72BMxGe1T9SkyaQ/p.png?size=1280x960&size_mode=3" style="height: 100px">
</div>
#Pedido enviado

<p>Tu pedido de <b>{{$nombre_producto}}</b> se ha enviado por medio de <b>{{$empresa_transporte}}</b>.</p>
<p>
    <b>Numero de Guía:</b> {{$numero_guia}}<br>
    <b>Fecha de Envio:</b> {{ now() }}<br>
    <b>Valor de la Compra:</b> <span>$</span><b>{{ $valor_compra }}</b> COP
</p>
<p>
    Para más detalles del pedido usa <b><a href="{{$url_pedido}}">este enlace</a></b>.</p>
<small>Si no functiona copia y pega el siguiente enlace en tu barra de direcciones {{$url_pedido}}</small> @endcomponent
