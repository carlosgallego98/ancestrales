<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/mdb.min.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/auth.min.css">
</head>

<body>
        <div id="particles-js"></div>

    <div class="auth-logo text-center">
        <img src="./img/logo.png" alt="Bebidas Típicas Cristina Lozano">
    </div>

    <div class="container">
        <div class="row vh-100 flex-center">
            
                @if ($errors->any())
                <div class="col-md-6">
                        <div class="alert alert-secondary">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                @endif

            <div class="col-md-6">
                @yield('formulario')
            </div>
        </div>
    </div>


    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/popper/popper.min.js"></script>
    <script type="text/javascript" src="./vendor/bootstrap/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="./vendor/bootstrap/mdb.min.js"></script>

    <script src="./vendor/particles/particles.min.js"></script>
    <script src="./js/background.js"></script>

    <script src="./js/auth.js"></script>

</body>

</html>
