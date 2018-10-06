<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')Bebidas Critina Lozano</title>
    <meta name="theme-color" content="#1049A9" />
    
    <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/mdb.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/regular.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/solid.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/css/styles.min.css">

    @stack('styles')
</head>

<body>

    <!-- Header -->
    @include('componentes.header')

    <!-- Contenido de la pagina -->
    <div class="main">
        @include('componentes.alert')
        @yield('contenido')
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

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="/vendor/bootstrap/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap/mdb.min.js"></script>
    @stack('scripts')

</body>

</html>
