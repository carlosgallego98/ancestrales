<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('titulo') | Bebidas Cristina Lozano</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/regular.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/solid.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/skins/skin-blue-light.min.css">
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.css">
    <link rel="stylesheet" href="/adminlte/css/skins/skin-blue.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <a href="index2.html" class="logo">
                <span class="logo-mini"><b>B</b>CL</span>
                <span class="logo-lg">Bebidas <b>Ancestrales</b></span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </a>
                    
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('inicio') }}" target="_blank">
                                <i class="fa fa-share"></i>
                                Página Principal
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{Auth::user()->avatar()}}" class="user-image" alt="User Image">

                                <span class="hidden-xs">{{Auth::user()->nombres}}</span>
                                <span class="hidden-xs">{{Auth::user()->apellidos}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{Auth::user()->nombres}} {{Auth::user()->apellidos}} <br>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('perfil') }}" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">

            <section class="sidebar">


                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{Auth::user()->avatar()}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->nombres}} <small>{{Auth::user()->apellidos}}</small></p>
                    </div>
                </div>

                {{--
        <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> 
      --}}

                <ul class="sidebar-menu" data-widget="tree">
                    @include('admin.componentes.sidebar')
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('titulo')
                    @foreach (Auth::user()->rol() as $rol)
                    <small class="text-capitalize">{{$rol}}</small>
                    @endforeach
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>
            <section class="content container-fluid">

                @yield('contenido')

            </section>
        </div>



        <footer class="main-footer text-center">
            <strong>Copyright &copy; {{date('Y')}} <a href="#">Bebidas Cristina Lozano</a>.</strong> Todos los derechos
            reservados.
        </footer>

    </div>

    <!-- jQuery 3 -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/adminlte/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/js/adminlte.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>
