<header>
    <!-- Barra de Usuario y Publicaciones -->
    <div class="navbar navbar-expand-lg userbar navbar-dark bg-secondary sticky-top">

        <div class="mx-auto">
            <a class="navbar-toggler" data-toggle="collapse" data-target="#userbar" aria-controls="userbar"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-align-center" href="#">Aqui Aparece la ultima publicacion con descuento</a>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="userbar">
            <ul class="navbar-nav ml-auto text-align-center">
                @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route('perfil') }}">{{Auth::user()->nombres}}</a></li>
                @if (Auth::user()->hasRole('comprador'))
                <li class="nav-item"><a class="nav-link" href="#">Mi Ordenes</a></li> 
                @else
                <li class="nav-item"><a class="nav-link" href="{{ route('panel') }}">Panel de Administracion</a></li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Inicia Sesion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
                </li>
                @endif
        
            </ul>
        </div>
    </div>

    @if (Request::is('*/*'))
        <!-- Carrusel de Imagenes publicitarias y Anuncios de la página principal-->
    <div class="header-carrousel carousel slide" data-ride="carousel" id="header-carrousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/slider-inicio/1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/slider-inicio/2.jpg"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/slider-inicio/3.jpg"
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carrousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#header-carrousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    @else
        
    @endif

    <!-- Barra de Navegacion Principal -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand mx-auto clearfix" href="{{ route('inicio') }}">
                <img src="./img/logo.png" alt="Comidas Típicas Cristina Lozano">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-ellipsis-v "></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mr-auto text-align-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Populares</a>
                    </li>
                </ul>
                <hr class="sm-only">
                <ul class="navbar-nav ml-auto text-align-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>