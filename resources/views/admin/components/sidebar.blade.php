<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        @foreach (Auth::user()->rol() as $rol)
        @switch($rol)
        @case('gerente')
        <a href="{{ route('gerente') }}" class="nav-link {{(Request::is('*gerencia') ? 'active' : '')}}">
            <i class="nav-icon fa fa-solar-panel"></i>
            <p>
                Escritorio
            </p>
        </a>
        @break
        @case('produccion')
        @case('despacho')
        <a href="{{ route('produccion') }}" class="nav-link {{(Request::is('*produccion-y-despacho') ? 'active' : '')}}">
            <i class="nav-icon fa fa-solar-panel"></i>
            <p>
                Escritorio
            </p>
        </a>
        @break
        @case('proveedor')
        <a href="{{ route('proveedor') }}" class="nav-link {{(Request::is('*proveedor') ? 'active' : '')}}">
            <i class="nav-icon fa fa-solar-panel"></i>
            <p>
                Escritorio
            </p>
        </a>
        @break

        @case('relaciones_publicas')
        <a href="{{ route('relaciones') }}" class="nav-link {{(Request::is('*relaciones-publicas') ? 'active' : '')}}">
            <i class="nav-icon fa fa-solar-panel"></i>
            <p>
                Escritorio
            </p>
        </a>
        @break
        @default

        @endswitch
        @endforeach
    </li>
</ul>
