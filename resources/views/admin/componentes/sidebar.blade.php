@foreach (Auth::user()->rol() as $rol)
@switch($rol)

@case('gerente')
<li class="header">Administracion / Gerencia</li>
<li class=""><a href="#">
        <i class="fa fa-desktop"></i>
        <span>Centro de Control</span></a>
</li>

<li class="">
    <a href="#">
        <i class="fa fa-cubes"></i>
        <span>Materia Prima</span></a>
</li>

<li class="">
    <a href="#">
        <i class="fa fa-money-check"></i>
        informe de ventas</a>
</li>

<li class="">
    <a href="#">
        <i class="fa fa-percent"></i>
        Promociones</a>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-chart-bar"></i> <span>Estadísticas</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#">Ventas</a></li>
        <li><a href="#">Pedidos</a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-shopping-cart"></i> <span>Pedidos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#">Por Confirmar</a></li>
        <li><a href="#">En Camino</a></li>
    </ul>
</li>

@break

@case('produccion')
<li class="header">Area de Produccion</li>
<li class=""><a href="#">
        <i class="fa fa-link"></i>
        <span>Productos</span></a>
</li>
<li class=""><a href="#">
        <i class="fa fa-link"></i>
        <span>Materia Prima</span></a>
</li>
@break

@case('despacho')
<li class="header">Area de Despacho</li>
<li class=""><a href="#">
        <i class="fa fa-link"></i>
        <span>Ordenes</span></a>
</li>
<li class=""><a href="#">
        <i class="fa fa-link"></i>
        <span>Envios</span></a>
</li>
@break

@case('proveedor')

<li class="header">Proveedores</li>
<li class=""><a href="#">
        <i class="fa fa-link"></i>
        <span>Productos</span></a>
</li>
@break

@case('relaciones_publicas')
<li class="header">Servicio al Cliente</li>
<li class=""><a href="#">
        <i class="fa fa-link"></i>
        <span>Usuarios</span></a>
</li>
@break
@default

@endswitch
@endforeach
