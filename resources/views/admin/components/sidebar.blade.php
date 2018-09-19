<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a href="{{ route('inicio') }}" target="_blank" class="nav-link">
            <i class="nav-icon fa fa-share-square"></i>
            <p>
                Página Principal
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('escritorio') }}" class="nav-link {{(Request::is('*panel') ? 'active' : '')}}">
            <i class="nav-icon fa fa-solar-panel"></i>
            <p>
                Escritorio
            </p>
        </a>
    </li>
</ul>
