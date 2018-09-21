<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
    
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/mdb.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/auth.min.css">
    @stack('styles')
</head>

<body>
    <div class="container">
        <div class="vh-100 flex-center row">
                @yield('formulario')
        </div>
    </div>


    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/popper/popper.min.js"></script>
    <script type="text/javascript" src="./vendor/bootstrap/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="./vendor/bootstrap/mdb.min.js"></script>

    <script src="./js/auth.js"></script>

    @stack('scripts')
</body>

</html>
