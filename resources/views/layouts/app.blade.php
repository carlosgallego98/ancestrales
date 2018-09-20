<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/mdb.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/regular.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/solid.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.min.css">

    @stack('styles')
</head>

<body>

    <!-- Header -->
    <header>
        <!-- Barra de Usuario y Publicaciones -->
        <div class="navbar navbar-expand-lg userbar navbar-dark bg-secondary sticky-top">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-align-center" href="#">Aqui Aparece la ultima publicacion con descuento</a>
                </li>
            </ul>

            <div class="mx-auto">
                <a class="navbar-toggler" data-toggle="collapse" data-target="#userbar" aria-controls="userbar"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="userbar">
                <ul class="navbar-nav ml-auto text-align-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicia Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Regístrate</a>
                    </li>
                    <!-- Menu que aparece al iniciar Sesion  -->
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Mi cuenta</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mi Ordenes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cerrar Sesión</a></li>
                     -->
                </ul>
            </div>
        </div>

        <!-- Carrusel de Imagenes publicitarias y Anuncios -->
        <div class="header-carrousel carousel slide" data-ride="carousel" id="header-carrousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/slider-inicio/1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMnNwtCkkWKtxg3ES6ZLX4kQGh1rhozj6agR4ovR1F-J2NxfD1Tw"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJ0dle3yEUTr07wuj9F4NQUa-eJX-6rBDKglO3w7G596oXHvDnlQ"
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

        <!-- Barra de Navegacion Principal -->
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand mx-auto clearfix" href="#">
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

    <!-- Contenido de la pagina -->
    <div class="main">
        @yield('conteinido')
    </div>
    <!-- Contenido de la pagina -->

    <!-- Footer -->
    <footer class="page-footer footer-light bg-primary">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="font-weight-bold h2-responsive">Store</h2>
                    <div class="ml-3">
                        <p>Las mejores bebidas típicas del pacifico.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="font-weight-bold h3-responsive">Contactanos</h3>
                    <div class="ml-3">
                        <h6 class="h6-responsive">+57 311 427 5483</h6>
                        <h6 class="h6-responsive">+57 316 854 8138</h6>
                        <h6 class="h6-responsive">bebidaspacifico@Store.com</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3 text-dark font-weight-bold">
            <a href="#">Todos los derechos reservados, Store 2018</a>
        </div>
    </footer>

    <script src="./vendor/jquery/jquery.min.js"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="./vendor/bootstrap/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="./vendor/bootstrap/mdb.min.js"></script>
    @stack('scripts')

</body>

</html>
