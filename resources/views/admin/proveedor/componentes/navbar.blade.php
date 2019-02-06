<nav class="navbar navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a href="{{route('proveedor')}}" class="navbar-brand"><small>Proveedores</small> <b>Bebidas</b> Cristina Lozano</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li class=""><a href="{{route('proveedor.pedidos')}}">Pedidos</a></li>
      </ul>

      <div class="nav navbar-nav">
      </div>
    </div>

    <div class="navbar-custom-menu">

      <ul class="nav navbar-nav">

        @include('admin.proveedor.componentes.pedidos')

        <li>
          <a href="#">
            <img src="{{auth()->user()->avatar()}}" class="user-image" alt="User Image"
            style="float: left;width: 25px;height: 25px;border-radius: 50%;margin-right: 10px;margin-top: -2px;">
            <span class="hidden-xs">{{auth()->user()->nombre}}</span>
          </a>
        </li>
        <li class="">
          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Cerrar Sesión') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
       </form>
     </li>
   </ul>
 </div>
</div>
</nav>
